<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark">تسجيل زيارة طوارئ جديدة</h2>
    <a href="/patients" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة للبحث عن مريض</a>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-5">
        <?php if ($patient): ?>
            <div class="alert alert-info mb-4 border-0 rounded-3 shadow-sm d-flex align-items-center p-3">
                <i class="fas fa-hospital-user fs-3 me-3 text-primary"></i>
                <div>
                    <h5 class="fw-bold mb-1">المريض المحدد: <?php echo htmlspecialchars($patient['full_name']); ?></h5>
                    <span class="text-muted small">الرقم القومي: <?php echo htmlspecialchars($patient['national_id']); ?></span>
                </div>
            </div>
            
            <form action="/visits/create" method="post">
                <input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>">
                
                <h5 class="fw-bold mb-4 mt-2 text-primary border-bottom pb-2">تفاصيل الزيارة</h5>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-secondary">حالة الزيارة المبدئية</label>
                        <select name="status" class="form-select form-select-lg bg-light text-muted">
                            <option value="triage" selected>فرز طبي (Triage)</option>
                            <option value="waiting">انتظار في الاستقبال</option>
                            <option value="in_treatment">إدخال مباشر للعلاج (حالة حرجة)</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-secondary">أولوية الحالة المبدئية (تقييم الاستقبال)</label>
                        <select name="priority" class="form-select form-select-lg bg-light text-muted">
                            <option value="non-urgent" selected>غير عاجلة</option>
                            <option value="urgent">عاجلة</option>
                            <option value="critical">حرجة (إنقاذ حياة)</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end border-top pt-4 mt-3">
                    <a href="/patients" class="btn btn-light btn-lg me-3 px-5 fw-bold hover-card">إلغاء</a>
                    <button type="submit" class="btn btn-danger btn-lg fw-bold px-5 shadow hover-card"><i class="fas fa-procedures me-2"></i>تأكيد فتح ملف طوارئ</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning border-0 rounded-3 text-center p-5">
                <i class="fas fa-exclamation-circle fs-1 text-warning mb-3 d-block"></i>
                <h5 class="fw-bold">يرجى تحديد مريض أولاً!</h5>
                <p class="text-muted">انتقل إلى <a href="/patients" class="fw-bold text-primary">سجل المرضى</a> لتحديد المريض المراجع وتسجيل زيارة طوارئ له.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
