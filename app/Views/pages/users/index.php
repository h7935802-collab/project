<?php use App\Core\Application; ?>
<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark"><i class="fas fa-users text-primary me-2"></i> إدارة الموظفين والصلاحيات</h2>
    <a href="/users/create" class="btn btn-primary fw-bold px-4 shadow-sm hover-card">+ إضافة موظف جديد</a>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3">م</th>
                        <th class="py-3">الاسم الكامل</th>
                        <th class="py-3">اسم المستخدم (للدخول)</th>
                        <th class="py-3">المنصب / الصلاحية</th>
                        <th class="pe-4 py-3">تاريخ الإضافة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td class="ps-4 text-primary"><strong>#<?php echo $u['id']; ?></strong></td>
                            <td class="fw-bold"><?php echo htmlspecialchars($u['full_name']); ?></td>
                            <td><span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fas fa-user-circle me-1 text-muted"></i> <?php echo htmlspecialchars($u['username']); ?></span></td>
                            <td>
                                <?php if($u['role'] == 'admin'): ?>
                                    <span class="badge bg-danger px-3 py-2 rounded-pill"><i class="fas fa-user-shield me-1"></i> مدير نظام</span>
                                <?php elseif($u['role'] == 'doctor'): ?>
                                    <span class="badge bg-primary px-3 py-2 rounded-pill"><i class="fas fa-user-md me-1"></i> طبيب</span>
                                <?php elseif($u['role'] == 'nurse'): ?>
                                    <span class="badge bg-info text-dark px-3 py-2 rounded-pill"><i class="fas fa-user-nurse me-1"></i> ممرض/ة</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill"><i class="fas fa-headset me-1"></i> استقبال</span>
                                <?php endif; ?>
                            </td>
                            <td class="pe-4 text-muted"><?php echo date('Y-m-d', strtotime($u['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center text-muted py-5"><i class="fas fa-users-slash fs-1 d-block mb-3 opacity-25"></i>لا يوجد موظفين مسجلين.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
