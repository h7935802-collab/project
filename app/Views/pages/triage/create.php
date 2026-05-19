<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark">إجراء فحص الفرز (Triage)</h2>
    <a href="/visits" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة لسجل الزيارات</a>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-5">
        <?php if ($visit): ?>
            <div class="alert alert-warning mb-4 border-0 rounded-3 shadow-sm d-flex align-items-center p-3">
                <i class="fas fa-user-injured fs-3 me-3 text-warning"></i>
                <div>
                    <h5 class="fw-bold mb-1">زيارة المريض: <?php echo htmlspecialchars($visit['full_name'] ?? 'مريض #' . $visit['patient_id']); ?></h5>
                    <span class="text-muted small">وقت الوصول: <?php echo date('H:i', strtotime($visit['arrival_time'])); ?></span>
                </div>
            </div>
            
            <form action="/triage/create" method="post">
                <input type="hidden" name="visit_id" value="<?php echo $visit['id']; ?>">
                
                <h5 class="fw-bold mb-4 mt-2 text-primary border-bottom pb-2">العلامات الحيوية الأساسية</h5>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <label class="form-label fw-bold text-secondary">ضغط الدم</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-heartbeat text-danger"></i></span>
                            <input type="text" name="blood_pressure" class="form-control bg-light" placeholder="مثال: 120/80">
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="form-label fw-bold text-secondary">درجة الحرارة</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-thermometer-half text-warning"></i></span>
                            <input type="text" name="temperature" class="form-control bg-light" placeholder="°C">
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="form-label fw-bold text-secondary">النبض</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-wave-square text-primary"></i></span>
                            <input type="number" name="heart_rate" class="form-control bg-light" placeholder="bpm">
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="form-label fw-bold text-secondary">الأكسجين</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="fas fa-lungs text-info"></i></span>
                            <input type="number" name="oxygen_saturation" class="form-control bg-light" placeholder="%">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary">الشكوى الرئيسية والأعراض</label>
                    <textarea name="chief_complaint" class="form-control bg-light" rows="3" required style="border-radius: 14px; padding: 15px; border: 2px solid transparent;"></textarea>
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bold text-secondary">مستوى الألم (1-10)</label>
                    <input type="number" name="pain_scale" class="form-control form-control-lg bg-light" min="1" max="10">
                </div>

                <div class="d-flex justify-content-end border-top pt-4 mt-3">
                    <a href="/visits" class="btn btn-light btn-lg me-3 px-5 fw-bold hover-card">إلغاء</a>
                    <button type="submit" class="btn btn-warning btn-lg fw-bold px-5 text-dark shadow hover-card"><i class="fas fa-save me-2"></i>حفظ وإرسال للطبيب</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning border-0 rounded-3 text-center p-5">
                <i class="fas fa-exclamation-triangle fs-1 text-warning mb-3 d-block"></i>
                <h5 class="fw-bold">لم يتم تحديد الزيارة!</h5>
                <p class="text-muted">انتقل إلى <a href="/visits" class="fw-bold text-primary">سجل الزيارات</a> لاختيار مريض لإجراء الفرز.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
