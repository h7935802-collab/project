<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="text-center">
        <div style="font-size: 80px; margin-bottom: 10px;">⚠️</div>
        <h2 class="fw-bold mt-3 mb-2" style="color: #1e293b;">حدث خطأ غير متوقع</h2>
        <p class="text-muted mb-4" style="font-size: 1.1rem;">
            <?php echo isset($exception) ? htmlspecialchars($exception->getMessage()) : 'خطأ في النظام. يرجى المحاولة لاحقاً.'; ?>
        </p>
        <a href="/" class="btn btn-lg px-5 py-3 fw-bold text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);">
            <i class="fas fa-home me-2"></i> العودة للرئيسية
        </a>
    </div>
</div>
