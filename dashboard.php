<?php
require '../../includes/config.php';
require '../../includes/auth.php';

if (!isLoggedIn() || $_SESSION['user_type'] != 'farmer') {
    header("Location: " . BASE_URL . "/login.php");
    exit;
}

// Get farmer details
$stmt = $pdo->prepare("SELECT * FROM farmers WHERE farmer_id = ?");
$stmt->execute([$_SESSION['farmer_id']]);
$farmer = $stmt->fetch();

// Get land count
$landCount = $pdo->prepare("SELECT COUNT(*) FROM lands WHERE farmer_id = ?")
    ->execute([$_SESSION['farmer_id']])
    ->fetchColumn();

// Get scheme applications
$appCount = $pdo->prepare("SELECT COUNT(*) FROM applications WHERE farmer_id = ?")
    ->execute([$_SESSION['farmer_id']])
    ->fetchColumn();

$pageTitle = "Farmer Dashboard";
require '../../includes/header.php';
?>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                <p class="card-text"><?php echo htmlspecialchars($farmer['name']); ?></p>
                <a href="profile.php" class="btn btn-light">View Profile</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Land Records</h5>
                <p class="card-text"><?php echo $landCount; ?> land records</p>
                <a href="land.php" class="btn btn-light">Manage Lands</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Scheme Applications</h5>
                <p class="card-text"><?php echo $appCount; ?> applications</p>
                <a href="schemes.php" class="btn btn-light">View Schemes</a>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Recent Activities</h5>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php
            $activities = $pdo->prepare("
                SELECT 'land' AS type, land_id AS id, 'Added land record' AS action, created_at AS date 
                FROM lands WHERE farmer_id = ?
                UNION
                SELECT 'scheme' AS type, app_id AS id, CONCAT('Applied for scheme: ', s.name) AS action, a.app_date AS date
                FROM applications a
                JOIN schemes s ON a.scheme_id = s.scheme_id
                WHERE a.farmer_id = ?
                ORDER BY date DESC
                LIMIT 5
            ")->execute([$_SESSION['farmer_id'], $_SESSION['farmer_id']])->fetchAll();
            
            if (empty($activities)) {
                echo '<div class="text-muted">No recent activities found</div>';
            } else {
                foreach ($activities as $activity) {
                    echo '<a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">' . htmlspecialchars($activity['action']) . '</h6>
                                <small>' . date('M d, Y', strtotime($activity['date'])) . '</small>
                            </div>
                        </a>';
                }
            }
            ?>
        </div>
    </div>
</div>

<?php require '../../includes/footer.php'; ?>