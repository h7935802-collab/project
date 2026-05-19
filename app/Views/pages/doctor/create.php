<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark">فحص الطبيب والملف الطبي</h2>
    <a href="/visits" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة للسجل</a>
</div>

<div class="row fade-in">
    <!-- Patient Info and Triage Summary -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 mb-4 hover-card">
            <div class="card-body bg-light rounded-4 p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-user-circle fs-2 text-primary me-3"></i>
                    <h5 class="fw-bold text-primary mb-0">بيانات المريض</h5>
                </div>
                <p class="mb-2"><strong>الاسم:</strong> <?php echo htmlspecialchars($visit['full_name']); ?></p>
                <p class="mb-2"><strong>الرقم القومي:</strong> <?php echo htmlspecialchars($visit['national_id']); ?></p>
                <p class="mb-0"><strong>العمر:</strong> <?php echo date_diff(date_create($visit['dob']), date_create('today'))->y; ?> سنة</p>
            </div>
        </div>

        <?php if (!empty($triage)): ?>
        <div class="card shadow-sm border-0 rounded-4 mb-4 border-start border-warning border-4 hover-card">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-file-medical-alt fs-3 text-warning me-3"></i>
                    <h5 class="fw-bold text-dark mb-0">تقييم الفرز (Triage)</h5>
                </div>
                <ul class="list-unstyled mb-3">
                    <li class="mb-2"><i class="fas fa-heartbeat text-danger me-2"></i><strong>ضغط الدم:</strong> <span class="fw-bold"><?php echo htmlspecialchars($triage['blood_pressure']); ?></span></li>
                    <li class="mb-2"><i class="fas fa-wave-square text-primary me-2"></i><strong>نبض القلب:</strong> <?php echo htmlspecialchars($triage['heart_rate']); ?> bpm</li>
                    <li class="mb-2"><i class="fas fa-thermometer-half text-warning me-2"></i><strong>الحرارة:</strong> <?php echo htmlspecialchars($triage['temperature']); ?> °C</li>
                    <li class="mb-0"><i class="fas fa-lungs text-info me-2"></i><strong>الأكسجين:</strong> <?php echo htmlspecialchars($triage['oxygen_saturation'] ?? '-'); ?> %</li>
                </ul>
                <hr>
                <div class="bg-light p-3 rounded-3">
                    <p class="mb-0 text-muted small"><strong>الشكوى الرئيسية والأعراض:</strong><br><?php echo nl2br(htmlspecialchars($triage['chief_complaint'] ?? $triage['notes'] ?? 'لا يوجد')); ?></p>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-warning border-0 rounded-4 shadow-sm p-4 text-center">
            <i class="fas fa-exclamation-triangle fs-2 d-block mb-2 text-warning"></i>
            لا توجد بيانات فرز مسجلة لهذا المريض.
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Medical Examination Form -->
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body p-5">
                <form action="/doctor/create" method="post">
                    <input type="hidden" name="visit_id" value="<?php echo $visit['id']; ?>">
                    
                    <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">التشخيص والعلاج</h5>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">التشخيص الطبي (Diagnosis) <span class="text-danger">*</span></label>
                        <textarea name="diagnosis" class="form-control bg-light" rows="3" required placeholder="اكتب التشخيص هنا..." style="border-radius: 14px; padding: 15px; border: 2px solid transparent;"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">خطة العلاج (Treatment Plan)</label>
                        <textarea name="treatment_plan" class="form-control bg-light" rows="3" placeholder="الإجراءات المتخذة في الطوارئ..." style="border-radius: 14px; padding: 15px; border: 2px solid transparent;"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">الوصفة الطبية (Prescriptions)</label>
                        <textarea name="prescriptions" class="form-control bg-light" rows="3" placeholder="الأدوية الموصوفة..." style="border-radius: 14px; padding: 15px; border: 2px solid transparent;"></textarea>
                    </div>

                    <div class="mb-4 p-4 bg-light rounded-4 border">
                        <label class="form-label fw-bold text-dark mb-3"><i class="fas fa-stethoscope me-2 text-primary"></i>القرار الطبي النهائي (تحديث حالة المريض)</label>
                        <select name="next_status" class="form-select form-select-lg border-primary shadow-sm" style="border-radius: 12px;">
                            <option value="discharged" selected>خروج المستشفى (Discharged)</option>
                            <option value="admitted">تنويم / دخول المستشفى (Admitted)</option>
                            <option value="transferred">تحويل لمستشفى آخر (Transferred)</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end pt-3 border-top mt-4 pt-4">
                        <a href="/visits" class="btn btn-light btn-lg me-3 px-5 fw-bold hover-card">إلغاء</a>
                        <button type="submit" class="btn btn-primary btn-lg fw-bold px-5 shadow hover-card"><i class="fas fa-save me-2"></i>حفظ التقرير وإنهاء الزيارة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
