<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark">إضافة مريض جديد</h2>
    <a href="/patients" class="btn btn-outline-secondary px-4 shadow-sm hover-card">عودة للسجل</a>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-5">
        <form action="/patients/create" method="post">
            <h5 class="fw-bold mb-4 text-primary border-bottom pb-2">البيانات الأساسية</h5>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">الاسم الرباعي <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="full_name" class="form-control bg-light" required>
                        <i class="fas fa-user text-muted"></i>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">الرقم القومي / الإقامة <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="national_id" class="form-control bg-light" required>
                        <i class="fas fa-id-card text-muted"></i>
                    </div>
                </div>
            </div>
            
            <h5 class="fw-bold mb-4 mt-2 text-primary border-bottom pb-2">بيانات التواصل</h5>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label fw-bold text-secondary">تاريخ الميلاد</label>
                    <input type="date" name="dob" class="form-control form-control-lg bg-light text-muted">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label fw-bold text-secondary">الجنس</label>
                    <select name="gender" class="form-select form-select-lg bg-light text-muted">
                        <option value="male">ذكر</option>
                        <option value="female">أنثى</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label fw-bold text-secondary">رقم الهاتف</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="phone" class="form-control bg-light">
                        <i class="fas fa-phone text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label fw-bold text-secondary">العنوان / السكن</label>
                <textarea name="address" class="form-control bg-light" rows="3" style="border-radius: 14px; padding: 15px; border: 2px solid transparent;"></textarea>
            </div>

            <div class="d-flex justify-content-end border-top pt-4">
                <a href="/patients" class="btn btn-light btn-lg me-3 px-5 fw-bold hover-card">إلغاء</a>
                <button type="submit" class="btn btn-primary btn-lg fw-bold px-5 shadow hover-card">حفظ بيانات المريض</button>
            </div>
        </form>
    </div>
</div>
