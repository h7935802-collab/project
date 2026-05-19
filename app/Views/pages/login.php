<?php
use App\Core\Application;
?>
<div class="login-container fade-in">
    <div class="login-card">
        <div class="login-icon">
            <i class="fas fa-heartbeat"></i>
        </div>
        <h1 class="login-title">نظام الطوارئ الطبية</h1>
        <p class="login-subtitle">تسجيل الدخول للموظفين والأطباء</p>
        
        <?php if (Application::$app->session->getFlash('error')): ?>
            <div class="alert alert-danger border-0 rounded-3 mb-4 shadow-sm fade-in">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <?php echo Application::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post" id="loginForm">
            <div class="mb-4">
                <label class="form-label fw-bold text-secondary">اسم المستخدم</label>
                <div class="input-icon-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="أدخل اسم المستخدم" required autocomplete="username" id="loginUsername">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold text-secondary">كلمة المرور</label>
                <div class="input-icon-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="أدخل كلمة المرور" required autocomplete="current-password" id="loginPassword">
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fas fa-sign-in-alt me-2"></i> دخول للنظام
            </button>
        </form>
        <div class="login-footer">
            <i class="fas fa-shield-halved me-1"></i> جميع البيانات محمية ومشفرة بأعلى المعايير
        </div>
    </div>
</div>
