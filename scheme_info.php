<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Farmers Schemes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }
        .max-w-3xl {
            max-width: 960px;
        }
        .scheme-card {
            background-color: #2d3748;
            border-radius: 0.75rem;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid #4a5568;
            position: relative;
        }
        .scheme-card a {
            display: block;
            text-decoration: none;
            color: inherit;
        }
        .scheme-card::before {
            pointer-events: none;
        }

        /* PM-KISAN card */
        .scheme-card:nth-child(2) {
            background-image: url('pmkisan.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(2)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(2) > * {
            position: relative;
            z-index: 2;
        }

        /* PMFBY card */
        .scheme-card:nth-child(3) {
            background-image: url('PMFBY1.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(3)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(3) > * {
            position: relative;
            z-index: 2;
        }

        /* PMKSY card */
        .scheme-card:nth-child(4) {
            background-image: url('pmksy10.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(4)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(4) > * {
            position: relative;
            z-index: 2;
        }

        /* KCC card */
        .scheme-card:nth-child(5) {
            background-image: url('kcc.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(5)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(5) > * {
            position: relative;
            z-index: 2;
        }

        /* SHC card */
        .scheme-card:nth-child(6) {
            background-image: url('shc.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(6)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(6) > * {
            position: relative;
            z-index: 2;
        }

        /* PKVY card */
        .scheme-card:nth-child(7) {
            background-image: url('pkvy.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(7)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(7) > * {
            position: relative;
            z-index: 2;
        }

        /* RKVY card */
        .scheme-card:nth-child(8) {
            background-image: url('rkvy2.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(8)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(8) > * {
            position: relative;
            z-index: 2;
        }

        /* NFSM card */
        .scheme-card:nth-child(9) {
            background-image: url('nfsm10.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(9)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(9) > * {
            position: relative;
            z-index: 2;
        }

        /* PM-KMY card */
        .scheme-card:nth-child(10) {
            background-image: url('pmkmdy.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(10)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(10) > * {
            position: relative;
            z-index: 2;
        }

        /* AIF card */
        .scheme-card:nth-child(11) {
            background-image: url('AIF1.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(11)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(11) > * {
            position: relative;
            z-index: 2;
        }

        /* NBHM card */
        .scheme-card:nth-child(12) {
            background-image: url('NBHM.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(12)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(12) > * {
            position: relative;
            z-index: 2;
        }

        /* NMNF card */
        .scheme-card:nth-child(13) {
            background-image: url('NMNF.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .scheme-card:nth-child(13)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        .scheme-card:nth-child(13) > * {
            position: relative;
            z-index: 2;
        }

        .scheme-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #fcd34d;
            margin-bottom: 0.75rem;
        }

        .scheme-type {
            color: #a0aec0;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            font-style: italic;
        }
        .scheme-details-title {
            font-weight: 500;
            color: #edf2f7;
            margin-bottom: 0.3rem;
        }
        .scheme-details {
            color: #e2e8f0;
            margin-bottom: 1rem;
        }
        .resource-link {
            color: #66a7ff;
            text-decoration: none;
            border-bottom: 1px solid #66a7ff;
            padding-bottom: 0.1rem;
            transition: color 0.3s ease-in-out;
        }
        .resource-link:hover {
            color: #90cdf4;
            border-bottom-color: #90cdf4;
        }
        .mt-8 {
            margin-top: 3rem;
        }
        .text-xl {
            font-size: 1.375rem;
        }
        .font-semibold {
            font-weight: 600;
        }
        .text-yellow-500 {
            color: #fcd34d;
        }
        .mb-4 {
            margin-bottom: 1.25rem;
        }
        .text-gray-300 {
            color: #d1d5db;
        }
        .list-disc {
            list-style-type: disc;
        }
        .list-inside {
            padding-left: 1.5rem;
        }
        
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle, rgba(55, 65, 81, 0.3) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: -1;
            opacity: 0.4;
        }
        .add-scheme-container {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
        }
        
        .add-scheme-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.8rem 1.8rem;
            background: linear-gradient(135deg, #f59e0b, #ef4444);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            text-decoration: none;
            z-index: 1;
        }
        
        .add-scheme-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }
        
        .add-scheme-btn:active {
            transform: translateY(1px);
        }
        
        .add-scheme-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ef4444, #f59e0b);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .add-scheme-btn:hover::before {
            opacity: 1;
        }
        
        .add-scheme-btn i {
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .add-scheme-btn.pulse {
            animation: pulse 2s infinite;
        }
        
        @media (max-width: 640px) {
            .add-scheme-btn {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white p-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-yellow-500 mb-6 text-center">Major Schemes for Indian Farmers</h1>

        <!-- PM-KISAN -->
        <div class="scheme-card">
            <a href="https://pmkisan.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Pradhan Mantri Kisan Samman Nidhi (PM-KISAN)</h2>
                <p class="scheme-type">Type: Direct Income Support</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides ₹6,000 per year in three equal installments of ₹2,000 every four months directly into the bank accounts of eligible small and marginal farmer families across the country.</p>
                <p class="scheme-details-title">Eligibility:</p>
                <p class="scheme-details">Generally for landholding farmer families who have cultivable land, subject to certain exclusion criteria.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Helps farmers meet their agricultural and domestic needs.</p>
            </a>
        </div>

        <!-- PMFBY -->
        <div class="scheme-card">
            <a href="https://pmfby.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Pradhan Mantri Fasal Bima Yojana (PMFBY)</h2>
                <p class="scheme-type">Type: Crop Insurance</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides insurance coverage and financial support to farmers in the event of crop losses due to natural calamities, pests, and diseases. Coverage is from pre-sowing to post-harvest losses.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Protects farmers from financial distress caused by crop failure and helps stabilize their income. Farmers pay a nominal premium.</p>
            </a>
        </div>

        <!-- PMKSY -->
        <div class="scheme-card">
            <a href="https://pmksy.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Pradhan Mantri Krishi Sinchayee Yojana (PMKSY)</h2>
                <p class="scheme-type">Type: Irrigation and Water Management</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Aims to enhance physical access of water on the farm and improve water use efficiency. Focuses on "Har Khet Ko Pani" (water to every farm) and "Per Drop More Crop". Components include Accelerated Irrigation Benefit Programme (AIBP), Har Khet Ko Pani (HKKP), and Per Drop More Crop (PDMC) which includes micro-irrigation.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Ensures protective irrigation, improves water efficiency, and increases agricultural productivity.</p>
            </a>
        </div>

        <!-- KCC -->
        <div class="scheme-card">
            <a href="https://www.nabard.org/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Kisan Credit Card (KCC) Scheme</h2>
                <p class="scheme-type">Type: Agricultural Credit</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides farmers with short-term credit for purchasing inputs like seeds, fertilizers, pesticides, and for other agricultural needs. The scheme has been extended to animal husbandry and fisheries.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Timely and easy access to credit at concessional interest rates, reducing reliance on informal lenders.</p>
            </a>
        </div>

        <!-- SHC -->
        <div class="scheme-card">
            <a href="https://soilhealth.dac.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Soil Health Card (SHC) Scheme</h2>
                <p class="scheme-type">Type: Soil Health Management</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides farmers with soil health cards that contain information about the nutrient status of their soil along with recommendations on the appropriate dosage of fertilizers to improve soil health and fertility.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Leads to judicious use of fertilizers, reduces input costs, and improves crop yields.</p>
            </a>
        </div>

        <!-- PKVY -->
        <div class="scheme-card">
            <a href="https://pgsindia-ncof.gov.in/PKVY/index.aspx" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Paramparagat Krishi Vikas Yojana (PKVY)</h2>
                <p class="scheme-type">Type: Organic Farming Promotion</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Promotes organic farming through cluster-based approaches and farmer training. Provides financial assistance for certification, training, and input procurement for organic farming.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Encourages sustainable and chemical-free farming practices, improves soil health, and enhances the marketability of organic produce.</p>
            </a>
        </div>

        <!-- RKVY -->
        <div class="scheme-card">
            <a href="https://rkvy.nic.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Rashtriya Krishi Vikas Yojana (RKVY)</h2>
                <p class="scheme-type">Type: Holistic Agricultural Development</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides flexibility and autonomy to states in planning and executing agriculture and allied sector schemes based on their priorities. Aims for holistic agricultural development.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Addresses diverse needs of the agriculture sector at the state level and promotes integrated development.</p>
            </a>
        </div>

        <!-- NFSM -->
        <div class="scheme-card">
            <a href="https://nfsm.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">National Food Security Mission (NFSM)</h2>
                <p class="scheme-type">Type: Production Enhancement</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Aims to increase the production of rice, wheat, pulses, coarse cereals, and nutri-cereals through area expansion and productivity enhancement in a sustainable manner.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Enhances food grain production and reduces dependence on imports.</p>
            </a>
        </div>

        <!-- PM-KMY -->
        <div class="scheme-card">
            <a href="https://pmkmy.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Pradhan Mantri Kisan Maan Dhan Yojana (PM-KMY)</h2>
                <p class="scheme-type">Type: Pension Scheme</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides a monthly pension of ₹3,000 to eligible small and marginal farmers upon reaching the age of 60 years. It is a contributory pension scheme where farmers make a small monthly contribution, and the government provides an equal contribution.</p>
                <p class="scheme-details-title">Eligibility:</p>
                <p class="scheme-details">Small and marginal farmers in the age group of 18 to 40 years, owning cultivable land up to 2 hectares.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Provides social security to farmers in their old age.</p>
            </a>
        </div>

        <!-- AIF -->
        <div class="scheme-card">
            <a href="https://agriinfra.dac.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">Agriculture Infrastructure Fund (AIF)</h2>
                <p class="scheme-type">Type: Infrastructure Development</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Provides medium- to long-term debt financing facility for investment in viable projects for post-harvest management infrastructure and community farming assets. Offers interest subvention and credit guarantee support.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Addresses infrastructure gaps in the agriculture sector and promotes investment in value chain development.</p>
            </a>
        </div>

        <!-- NBHM -->
        <div class="scheme-card">
            <a href="https://www.nbb.gov.in/" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">National Beekeeping & Honey Mission (NBHM)</h2>
                <p class="scheme-type">Type: Allied Agriculture</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Aims to promote the holistic growth of the beekeeping sector to enhance honey production, increase farmers' income, and generate employment.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Supports beekeepers through training, infrastructure development, and marketing assistance.</p>
            </a>
        </div>

        <!-- NMNF -->
        <div class="scheme-card">
            <a href="https://pgsindia-ncof.gov.in/NMNF/index.aspx" target="_blank" class="block h-full w-full">
                <h2 class="scheme-title">National Mission on Natural Farming (NMNF)</h2>
                <p class="scheme-type">Type: Sustainable Agriculture</p>
                <p class="scheme-details-title">Details:</p>
                <p class="scheme-details">Promotes traditional indigenous practices that reduce dependence on external inputs. Focuses on on-farm biomass recycling and the use of cow dung-urine formulations.</p>
                <p class="scheme-details-title">Benefits:</p>
                <p class="scheme-details">Encourages chemical-free farming, improves soil health, and reduces input costs.</p>
            </a>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-yellow-500 mb-4">How to Get More Information:</h2>
            <p class="text-gray-300 mb-2">For detailed and the most up-to-date information on specific schemes, including eligibility criteria, application processes, and benefits, you can refer to the following resources:</p>
            <ul class="list-disc list-inside text-gray-300">
                <li><a href="https://agriwelfare.gov.in/" target="_blank" class="resource-link">Official Website of the Department of Agriculture & Farmers Welfare, Government of India</a></li>
                <li><a href="https://farmer.gov.in/" target="_blank" class="resource-link">Farmers Portal</a></li>
                <li><a href="https://www.myscheme.gov.in/" target="_blank" class="resource-link">myScheme Portal</a></li>
                <li>State Government Agriculture Departments (Please visit the website of your respective state's agriculture department)</li>
                <li><a href="https://www.nabard.org/" target="_blank" class="resource-link">NABARD (National Bank for Agriculture and Rural Development)</a></li>
                <li>Local Agricultural Extension Officers (Contact the agriculture department in your district or region)</li>
            </ul>
            <p class="text-gray-300 mt-4">It is always advisable to check the latest guidelines and eligibility criteria for any scheme directly from the official sources before applying. Agricultural schemes and their details can change over time.</p>
        </div>
    </div>

    <div class="add-scheme-container">
        <a href="add_scheme.php" class="add-scheme-btn pulse">
            <i class="fas fa-plus-circle"></i>
            Add New Scheme
        </a>
    </div>
</body>
</html>