<?php use App\Core\Application; ?>
<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark">سجل المرضى</h2>
    <a href="/patients/create" class="btn btn-primary fw-bold px-4 shadow-sm hover-card">+ تسجيل مريض جديد</a>
</div>

<?php if (Application::$app->session->getFlash('success')): ?>
    <div class="alert alert-success border-0 rounded-3 shadow-sm fade-in">
        <i class="fas fa-check-circle me-2"></i> <?php echo Application::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3">رقم الملف (ID)</th>
                        <th class="py-3">الرقم القومي</th>
                        <th class="py-3">الاسم الرباعي</th>
                        <th class="py-3">رقم الهاتف</th>
                        <th class="pe-4 py-3 text-end">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($patients)): ?>
                        <?php foreach ($patients as $p): ?>
                        <tr>
                            <td class="ps-4 text-primary"><strong>#<?php echo $p['id']; ?></strong></td>
                            <td><?php echo htmlspecialchars($p['national_id']); ?></td>
                            <td class="fw-bold"><?php echo htmlspecialchars($p['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($p['phone'] ?: '-'); ?></td>
                            <td class="pe-4 text-end">
                                <a href="/patients/view?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-info text-white me-2"><i class="fas fa-file-medical-alt"></i> تفاصيل</a>
                                <a href="/visits/create?patient_id=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fas fa-ambulance"></i> طوارئ</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted py-5"><i class="fas fa-folder-open fs-1 d-block mb-3 opacity-25"></i>لا يوجد مرضى مسجلين حتى الآن.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
