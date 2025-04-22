<?php
require '../../includes/config.php';
require '../../includes/auth.php';

if (!isLoggedIn() || $_SESSION['user_type'] != 'admin') {
    header("Location: " . BASE_URL . "/login.php");
    exit;
}

$message = '';
$error = '';

// Handle scheme actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_scheme'])) {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $department = trim($_POST['department']);
        $eligibility = trim($_POST['eligibility']);
        $benefits = trim($_POST['benefits']);
        
        try {
            $stmt = $pdo->prepare("INSERT INTO schemes (name, description, department, eligibility, benefits) 
                                  VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $description, $department, $eligibility, $benefits]);
            $message = "Scheme added successfully!";
        } catch (PDOException $e) {
            $error = "Error adding scheme: " . $e->getMessage();
        }
    } elseif (isset($_POST['update_scheme'])) {
        $schemeId = $_POST['scheme_id'];
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $department = trim($_POST['department']);
        $eligibility = trim($_POST['eligibility']);
        $benefits = trim($_POST['benefits']);
        $status = trim($_POST['status']);
        
        try {
            $stmt = $pdo->prepare("UPDATE schemes SET 
                name = ?, description = ?, department = ?, 
                eligibility = ?, benefits = ?, status = ?
                WHERE scheme_id = ?");
            $stmt->execute([$name, $description, $department, $eligibility, $benefits, $status, $schemeId]);
            $message = "Scheme updated successfully!";
        } catch (PDOException $e) {
            $error = "Error updating scheme: " . $e->getMessage();
        }
    }
}

// Handle scheme status change
if (isset($_GET['toggle_status'])) {
    $schemeId = $_GET['toggle_status'];
    
    try {
        $stmt = $pdo->prepare("UPDATE schemes SET status = IF(status='active','inactive','active') WHERE scheme_id = ?");
        $stmt->execute([$schemeId]);
        $message = "Scheme status updated!";
    } catch (PDOException $e) {
        $error = "Error updating scheme status: " . $e->getMessage();
    }
}

// Get all schemes
$schemes = $pdo->query("SELECT * FROM schemes ORDER BY status DESC, name")->fetchAll();

$pageTitle = "Manage Schemes";
require '../../includes/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Government Schemes</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSchemeModal">
                    <i class="bi bi-plus"></i> Add Scheme
                </button>
            </div>
            <div class="card-body">
                <?php if (empty($schemes)): ?>
                    <div class="alert alert-info">No schemes added yet.</div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($schemes as $scheme): ?>
                                <tr>
                                    <td><?php echo $scheme['scheme_id']; ?></td>
                                    <td><?php echo htmlspecialchars($scheme['name']); ?></td>
                                    <td><?php echo htmlspecialchars($scheme['department']); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo $scheme['status'] == 'active' ? 'success' : 'secondary'; ?>">
                                            <?php echo ucfirst($scheme['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" 
                                            data-bs-target="#editSchemeModal<?php echo $scheme['scheme_id']; ?>">
                                            Edit
                                        </button>
                                        <a href="?toggle_status=<?php echo $scheme['scheme_id']; ?>" 
                                           class="btn btn-sm btn-<?php echo $scheme['status'] == 'active' ? 'warning' : 'success'; ?>">
                                            <?php echo $scheme['status'] == 'active' ? 'Deactivate' : 'Activate'; ?>
                                        </a>
                                        <a href="scheme_applications.php?scheme_id=<?php echo $scheme['scheme_id']; ?>" 
                                           class="btn btn-sm btn-primary">
                                            View Applications
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit Scheme Modal -->
                                <div class="modal fade" id="editSchemeModal<?php echo $scheme['scheme_id']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Scheme</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post">
                                                <input type="hidden" name="scheme_id" value="<?php echo $scheme['scheme_id']; ?>">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Scheme Name*</label>
                                                        <input type="text" class="form-control" name="name" 
                                                            value="<?php echo htmlspecialchars($scheme['name']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Department*</label>
                                                        <input type="text" class="form-control" name="department" 
                                                            value="<?php echo htmlspecialchars($scheme['department']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Status*</label>
                                                        <select class="form-select" name="status" required>
                                                            <option value="active" <?php echo $scheme['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                                                            <option value="inactive" <?php echo $scheme['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description*</label>
                                                        <textarea class="form-control" name="description" rows="3" required><?php 
                                                            echo htmlspecialchars($scheme['description']); ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Eligibility Criteria*</label>
                                                        <textarea class="form-control" name="eligibility" rows="3" required><?php 
                                                            echo htmlspecialchars($scheme['eligibility']); ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Benefits*</label>
                                                        <textarea class="form-control" name="benefits" rows="3" required><?php 
                                                            echo htmlspecialchars($scheme['benefits']); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_scheme" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Add Scheme Modal -->
<div class="modal fade" id="addSchemeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Scheme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Scheme Name*</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department*</label>
                        <input type="text" class="form-control" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description*</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Eligibility Criteria*</label>
                        <textarea class="form-control" name="eligibility" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Benefits*</label>
                        <textarea class="form-control" name="benefits" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_scheme" class="btn btn-primary">Add Scheme</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require '../../includes/footer.php'; ?>