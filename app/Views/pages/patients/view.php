<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark"><i class="fas fa-file-medical-alt text-primary me-2"></i> السجل الطبي التاريخي</h2>
    <div>
        <button onclick="window.print()" class="btn btn-primary px-4 me-2 shadow-sm hover-card"><i class="fas fa-print"></i> طباعة السجل</button>
        <a href="/patients" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة</a>
    </div>
</div>

<!-- Patient Profile Header -->
<div class="card shadow-sm border-0 rounded-4 mb-5 bg-primary text-white fade-in hover-card">
    <div class="card-body p-4 d-flex align-items-center">
        <div class="display-3 me-4"><i class="fas fa-user-circle"></i></div>
        <div>
            <h3 class="fw-bold mb-2"><?php echo htmlspecialchars($patient['full_name']); ?></h3>
            <div class="d-flex gap-4 opacity-75">
                <span><i class="fas fa-id-card me-1"></i> <strong>الرقم القومي:</strong> <?php echo htmlspecialchars($patient['national_id']); ?></span>
                <span><i class="fas fa-phone me-1"></i> <strong>رقم الهاتف:</strong> <?php echo htmlspecialchars($patient['phone'] ?: 'غير محدد'); ?></span>
                <span><i class="fas fa-birthday-cake me-1"></i> <strong>تاريخ الميلاد:</strong> <?php echo $patient['dob'] ?: 'غير محدد'; ?></span>
            </div>
        </div>
    </div>
</div>

<h4 class="fw-bold mb-4 text-dark fade-in"><i class="fas fa-history text-secondary me-2"></i> تاريخ الزيارات للطوارئ</h4>

<?php if (empty($visits)): ?>
    <div class="alert alert-light border-0 rounded-4 text-center py-5 shadow-sm fade-in">
        <i class="fas fa-folder-open fs-1 text-muted opacity-25 mb-3 d-block"></i>
        <h5 class="text-muted fw-bold">لا يوجد أي سجل زيارات سابقة لهذا المريض.</h5>
    </div>
<?php else: ?>
    <div class="timeline ps-3 border-start border-3 border-primary ms-3 fade-in">
        <?php foreach ($visits as $v): ?>
            <div class="card shadow-sm border-0 rounded-4 mb-4 position-relative hover-card">
                <!-- Timeline Dot -->
                <span class="position-absolute translate-middle p-2 bg-primary border border-light rounded-circle shadow-sm" style="top: 35px; left: -18px;"></span>
                
                <div class="card-header bg-light border-0 d-flex justify-content-between py-3 rounded-top-4">
                    <span class="fw-bold text-primary"><i class="fas fa-hashtag me-1"></i> زيارة رقم <?php echo $v['id']; ?></span>
                    <span class="text-muted"><i class="fas fa-calendar-alt me-1"></i> <?php echo date('Y-m-d h:i A', strtotime($v['arrival_time'])); ?></span>
                </div>
                
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-5 border-end">
                            <h6 class="fw-bold text-dark mb-3"><span class="badge bg-warning text-dark me-2 px-3 py-2 rounded-pill"><i class="fas fa-stethoscope"></i> فرز طبي</span> العلامات الحيوية المبدئية</h6>
                            <?php if ($v['blood_pressure']): ?>
                                <ul class="list-unstyled mb-2">
                                    <li class="mb-1"><i class="fas fa-heartbeat text-danger me-2"></i><strong>الضغط:</strong> <span class="fw-bold"><?php echo htmlspecialchars($v['blood_pressure']); ?></span></li>
                                    <li class="mb-1"><i class="fas fa-wave-square text-primary me-2"></i><strong>النبض:</strong> <?php echo htmlspecialchars($v['heart_rate']); ?> bpm</li>
                                    <li class="mb-1"><i class="fas fa-thermometer-half text-warning me-2"></i><strong>الحرارة:</strong> <?php echo htmlspecialchars($v['temperature']); ?> °C</li>
                                </ul>
                                <?php if($v['triage_notes']): ?>
                                    <div class="bg-light p-2 rounded-3 mt-2 border-start border-warning border-3">
                                        <p class="mb-0 text-muted small"><em>ملاحظة تمريض: <?php echo htmlspecialchars($v['triage_notes']); ?></em></p>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-muted small"><i class="fas fa-info-circle me-1"></i> لم يتم تسجيل تقييم للفرز.</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-7 ps-4">
                            <h6 class="fw-bold text-dark mb-3"><span class="badge bg-primary me-2 px-3 py-2 rounded-pill"><i class="fas fa-user-md"></i> فحص طبي</span> التقرير والتشخيص</h6>
                            <?php if ($v['diagnosis']): ?>
                                <p class="mb-2 text-primary fw-bold"><i class="fas fa-user-md me-1"></i> الطبيب المعالج: د. <?php echo htmlspecialchars($v['doctor_name']); ?></p>
                                <div class="bg-light p-3 rounded-3 mb-2 border border-light">
                                    <strong class="d-block text-dark mb-1"><i class="fas fa-notes-medical text-primary me-1"></i> التشخيص:</strong>
                                    <?php echo nl2br(htmlspecialchars($v['diagnosis'])); ?>
                                </div>
                                <?php if($v['treatment_plan']): ?>
                                    <div class="bg-light p-3 rounded-3 mb-2 border border-light">
                                        <strong class="d-block text-dark mb-1"><i class="fas fa-procedures text-success me-1"></i> خطة العلاج:</strong>
                                        <?php echo nl2br(htmlspecialchars($v['treatment_plan'])); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($v['prescriptions']): ?>
                                    <div class="bg-light p-3 rounded-3 border border-light">
                                        <strong class="d-block text-dark mb-1"><i class="fas fa-pills text-danger me-1"></i> الأدوية الموصوفة:</strong>
                                        <?php echo nl2br(htmlspecialchars($v['prescriptions'])); ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="alert alert-secondary border-0 py-2 rounded-3"><i class="fas fa-clock me-1"></i> لا يوجد تقرير طبي مسجل. <?php echo $v['status'] == 'in_treatment' || $v['status'] == 'waiting' ? '(المريض لم ينته من العلاج)' : ''; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 text-end text-muted small pb-3 pt-0">
                    الحالة النهائية للزيارة: 
                    <?php 
                        if($v['status'] == 'discharged') echo '<span class="badge bg-success px-3 py-2 rounded-pill">خروج / شفاء</span>';
                        elseif($v['status'] == 'admitted') echo '<span class="badge bg-info text-dark px-3 py-2 rounded-pill">تنويم / دخول المستشفى</span>';
                        else echo '<span class="badge bg-secondary px-3 py-2 rounded-pill">تحت الإجراء / غير منتهية</span>';
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<style>
@media print {
    .navbar, .btn, .alert, .timeline .position-absolute {
        display: none !important;
    }
    body {
        background-color: white !important;
        padding: 0 !important;
    }
    .card {
        border: 1px solid #ddd !important;
        box-shadow: none !important;
        page-break-inside: avoid;
        margin-bottom: 20px !important;
    }
    .border-start {
        border-left: none !important;
    }
    .timeline {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }
}
</style>
