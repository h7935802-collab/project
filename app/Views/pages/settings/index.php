<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark"><i class="fas fa-cogs text-primary me-2"></i> إعدادات المركز الطبي</h2>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-5">
        <form action="/settings" method="post">
            <h5 class="fw-bold mb-4 text-primary border-bottom pb-2">البيانات الأساسية للعيادة / المستشفى</h5>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">اسم المركز <span class="text-danger">*</span></label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="hospital_name" value="<?php echo htmlspecialchars($setting->hospital_name); ?>" class="form-control bg-light" required>
                        <i class="fas fa-hospital text-muted"></i>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">الرقم الضريبي (VAT)</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="vat_number" value="<?php echo htmlspecialchars($setting->vat_number); ?>" class="form-control bg-light">
                        <i class="fas fa-percentage text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">رقم الهاتف للعملاء</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="phone" value="<?php echo htmlspecialchars($setting->phone); ?>" class="form-control bg-light">
                        <i class="fas fa-phone text-muted"></i>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold text-secondary">عنوان المركز (يطبع على الفاتورة)</label>
                    <div class="input-icon-wrapper">
                        <input type="text" name="address" value="<?php echo htmlspecialchars($setting->address); ?>" class="form-control bg-light">
                        <i class="fas fa-map-marker-alt text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end pt-3 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-lg fw-bold px-5 shadow hover-card"><i class="fas fa-save me-2"></i> تحديث الإعدادات</button>
            </div>
        </form>
    </div>
</div>
