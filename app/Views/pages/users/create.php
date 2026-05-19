<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark"><i class="fas fa-user-plus text-primary me-2"></i> إضافة موظف جديد</h2>
    <a href="/users" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة للقائمة</a>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-5">
        <form action="/users/create" method="post">
            <h5 class="fw-bold mb-4 text-primary border-bottom pb-2">بيانات الموظف</h5>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">الاسم الكامل <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="full_name" class="form-control bg-light" required>
                        <i class="fas fa-id-card text-muted"></i>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">المنصب (الصلاحيات) <span class="text-danger">*</span></label>
                    <select name="role" class="form-select form-select-lg bg-light text-muted" required>
                        <option value="receptionist">موظف استقبال</option>
                        <option value="nurse">ممرض / ممرضة</option>
                        <option value="doctor">طبيب</option>
                        <option value="admin">مدير نظام</option>
                    </select>
                </div>
            </div>
            
            <h5 class="fw-bold mb-4 mt-2 text-primary border-bottom pb-2">بيانات الدخول النظامية</h5>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">اسم المستخدم (للدخول) <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="username" class="form-control bg-light" required autocomplete="new-username">
                        <i class="fas fa-user text-muted"></i>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">كلمة المرور المؤقتة <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="password" name="password" class="form-control bg-light" required autocomplete="new-password">
                        <i class="fas fa-lock text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end border-top pt-4 mt-3">
                <a href="/users" class="btn btn-light btn-lg me-3 px-5 fw-bold hover-card">إلغاء</a>
                <button type="submit" class="btn btn-primary btn-lg fw-bold px-5 shadow hover-card"><i class="fas fa-user-check me-2"></i>حفظ وإضافة الموظف</button>
            </div>
        </form>
    </div>
</div>
