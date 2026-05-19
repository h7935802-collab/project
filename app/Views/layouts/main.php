<?php 
use App\Core\Application; 
use App\Models\Setting;
$sysSetting = new Setting();
try {
    $sysSetting->loadAll();
} catch (\Exception $e) {} // Fail silently if DB not ready
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($sysSetting->hospital_name ?? 'نظام إدارة الطوارئ الطبية'); ?></title>
    <!-- Bootstrap 5 RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <!-- Font Awesome and SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
    </style>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); box-shadow: 0 4px 20px rgba(37,99,235,0.3);">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="/" style="font-size: 1.1rem; letter-spacing: -0.3px;">
                <i class="fas fa-heartbeat me-2" style="color: #f87171;"></i> 
                <?php echo htmlspecialchars($sysSetting->hospital_name ?? 'نظام الطوارئ الطبية'); ?>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php if (!Application::isGuest()): 
                    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                ?>
                <ul class="navbar-nav me-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 <?php echo $currentPath == '/' ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/">
                            <i class="fas fa-tachometer-alt me-1"></i> الرئيسية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 <?php echo str_starts_with($currentPath, '/patients') ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/patients">
                            <i class="fas fa-user-injured me-1"></i> المرضى
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 <?php echo str_starts_with($currentPath, '/visits') ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/visits">
                            <i class="fas fa-ambulance me-1"></i> زيارات الطوارئ
                        </a>
                    </li>
                    <?php if (Application::$app->user->role === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 text-warning <?php echo str_starts_with($currentPath, '/invoices') ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/invoices">
                            <i class="fas fa-file-invoice-dollar me-1"></i> الحسابات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 text-warning <?php echo str_starts_with($currentPath, '/users') ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/users">
                            <i class="fas fa-users me-1"></i> الموظفين
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-3 text-warning <?php echo str_starts_with($currentPath, '/settings') ? 'bg-white bg-opacity-25 fw-bold' : ''; ?>" href="/settings">
                            <i class="fas fa-cog me-1"></i> الإعدادات
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto gap-2 align-items-center">
                    <li class="nav-item">
                        <div class="d-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white bg-opacity-10">
                            <i class="fas fa-user-circle text-white"></i>
                            <span class="text-white" style="font-size: 0.9rem;"><?php echo htmlspecialchars(Application::$app->user->full_name); ?></span>
                            <?php
                                $roleLabels = ['admin' => ['text' => 'مدير', 'class' => 'bg-danger'], 'doctor' => ['text' => 'طبيب', 'class' => 'bg-info text-dark'], 'nurse' => ['text' => 'ممرض', 'class' => 'bg-warning text-dark'], 'receptionist' => ['text' => 'استقبال', 'class' => 'bg-secondary']];
                                $role = Application::$app->user->role;
                                $roleInfo = $roleLabels[$role] ?? ['text' => $role, 'class' => 'bg-secondary'];
                            ?>
                            <span class="badge <?php echo $roleInfo['class']; ?> rounded-pill" style="font-size:0.7rem;"><?php echo $roleInfo['text']; ?></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm px-3 py-2 fw-bold text-white" href="/logout" style="background: rgba(239,68,68,0.85); border-radius: 10px; transition: all 0.2s ease;" onmouseenter="this.style.background='rgba(239,68,68,1)'" onmouseleave="this.style.background='rgba(239,68,68,0.85)'">
                            <i class="fas fa-sign-out-alt me-1"></i> خروج
                        </a>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt me-1"></i> تسجيل الدخول</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        {{content}}
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (Application::$app->session->getFlash('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'نجاح',
                text: '<?php echo addslashes(Application::$app->session->getFlash("success")); ?>',
                confirmButtonText: 'حسناً',
                confirmButtonColor: '#198754'
            });
        <?php endif; ?>

        <?php if (Application::$app->session->getFlash('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'تنبيه',
                text: '<?php echo addslashes(Application::$app->session->getFlash("error")); ?>',
                confirmButtonText: 'إغلاق',
                confirmButtonColor: '#dc3545'
            });
        <?php endif; ?>
    </script>
</body>
</html>
