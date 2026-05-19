<?php
$user = \App\Core\Application::$app->user;
?>
<!-- Welcome Banner -->
<div class="mb-4" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%); border-radius: 20px; padding: 32px; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -50px; right: 30px; width: 200px; height: 200px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
        <div>
            <h2 class="fw-bold mb-1" style="font-size: 1.6rem;">مرحباً بك، <?php echo htmlspecialchars($user->full_name ?? ''); ?> 👋</h2>
            <p class="mb-0 opacity-75" style="font-size: 0.95rem;">لوحة التحكم التفاعلية لمركز الطوارئ الطبي</p>
        </div>
        <div class="d-none d-md-block" style="font-size: 3.5rem; opacity: 0.3;">
            <i class="fas fa-heartbeat"></i>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <!-- Active Cases -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden; transition: all 0.3s ease;" onmouseenter="this.style.transform='translateY(-4px)'" onmouseleave="this.style.transform='translateY(0)'">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1 fw-bold" style="font-size: 0.82rem; letter-spacing: 0.5px;">حالات الطوارئ النشطة</p>
                        <h2 class="fw-bold mb-0" style="font-size: 2.5rem; color: #ef4444;"><?php echo $active_cases ?? 0; ?></h2>
                    </div>
                    <div style="width: 52px; height: 52px; background: rgba(239, 68, 68, 0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-exclamation-triangle" style="font-size: 1.3rem; color: #ef4444;"></i>
                    </div>
                </div>
                <p class="mb-0 text-muted" style="font-size: 0.82rem;">
                    <i class="fas fa-info-circle me-1"></i> جميع الحالات التي لم يتم تخريجها بعد
                </p>
            </div>
            <div style="height: 4px; background: linear-gradient(90deg, #ef4444, #f87171);"></div>
        </div>
    </div>

    <!-- Triage Cases -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden; transition: all 0.3s ease;" onmouseenter="this.style.transform='translateY(-4px)'" onmouseleave="this.style.transform='translateY(0)'">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1 fw-bold" style="font-size: 0.82rem; letter-spacing: 0.5px;">في قسم الفرز (Triage)</p>
                        <h2 class="fw-bold mb-0" style="font-size: 2.5rem; color: #f59e0b;"><?php echo $triage_cases ?? 0; ?></h2>
                    </div>
                    <div style="width: 52px; height: 52px; background: rgba(245, 158, 11, 0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-stethoscope" style="font-size: 1.3rem; color: #f59e0b;"></i>
                    </div>
                </div>
                <p class="mb-0 text-muted" style="font-size: 0.82rem;">
                    <i class="fas fa-clock me-1"></i> في انتظار التقييم الحيوي في الفرز
                </p>
            </div>
            <div style="height: 4px; background: linear-gradient(90deg, #f59e0b, #fbbf24);"></div>
        </div>
    </div>

    <!-- Available Beds -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; overflow: hidden; transition: all 0.3s ease;" onmouseenter="this.style.transform='translateY(-4px)'" onmouseleave="this.style.transform='translateY(0)'">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted mb-1 fw-bold" style="font-size: 0.82rem; letter-spacing: 0.5px;">أسرّة متاحة</p>
                        <h2 class="fw-bold mb-0" style="font-size: 2.5rem; color: #10b981;"><?php echo $available_beds ?? 15; ?></h2>
                    </div>
                    <div style="width: 52px; height: 52px; background: rgba(16, 185, 129, 0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-bed" style="font-size: 1.3rem; color: #10b981;"></i>
                    </div>
                </div>
                <p class="mb-0 text-muted" style="font-size: 0.82rem;">
                    <i class="fas fa-check-circle me-1"></i> جاهزة لاستقبال مرضى في العناية
                </p>
            </div>
            <div style="height: 4px; background: linear-gradient(90deg, #10b981, #34d399);"></div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 fade-in">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm hover-card" style="border-radius: 16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color: #0f172a;">
                    <i class="fas fa-bolt me-2" style="color: #6366f1;"></i> إجراءات سريعة
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="/patients/create" class="d-flex align-items-center p-3 text-decoration-none hover-action-btn" style="background: #f8fafc; border-radius: 14px; border: 1.5px solid transparent;">
                            <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #6366f1, #8b5cf6); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-left: 14px; flex-shrink: 0;">
                                <i class="fas fa-user-plus text-white"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: #0f172a; font-size: 0.9rem;">تسجيل مريض جديد</h6>
                                <small class="text-muted">إضافة مريض جديد في السجل</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/patients" class="d-flex align-items-center p-3 text-decoration-none hover-action-btn" style="background: #f8fafc; border-radius: 14px; border: 1.5px solid transparent;">
                            <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #ef4444, #f87171); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-left: 14px; flex-shrink: 0;">
                                <i class="fas fa-ambulance text-white"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: #0f172a; font-size: 0.9rem;">فتح ملف طوارئ</h6>
                                <small class="text-muted">تحويل مريض لقسم الطوارئ</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/visits" class="d-flex align-items-center p-3 text-decoration-none hover-action-btn" style="background: #f8fafc; border-radius: 14px; border: 1.5px solid transparent;">
                            <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-left: 14px; flex-shrink: 0;">
                                <i class="fas fa-clipboard-list text-white"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: #0f172a; font-size: 0.9rem;">سجل الزيارات</h6>
                                <small class="text-muted">عرض جميع زيارات الطوارئ</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/invoices" class="d-flex align-items-center p-3 text-decoration-none hover-action-btn" style="background: #f8fafc; border-radius: 14px; border: 1.5px solid transparent;">
                            <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #10b981, #34d399); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-left: 14px; flex-shrink: 0;">
                                <i class="fas fa-file-invoice-dollar text-white"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: #0f172a; font-size: 0.9rem;">الفواتير</h6>
                                <small class="text-muted">إدارة الحسابات والفواتير</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color: #0f172a;">
                    <i class="fas fa-info-circle me-2" style="color: #6366f1;"></i> حالة النظام
                </h5>
                <div class="d-flex align-items-center mb-3 p-3" style="background: #f0fdf4; border-radius: 12px;">
                    <div style="width: 10px; height: 10px; background: #10b981; border-radius: 50%; margin-left: 12px; box-shadow: 0 0 8px rgba(16,185,129,0.4); animation: pulse 2s infinite;"></div>
                    <span class="fw-bold" style="color: #166534; font-size: 0.88rem;">النظام يعمل بشكل طبيعي</span>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted fw-bold">إشغال الأسرّة</small>
                        <small class="fw-bold" style="color: #6366f1;"><?php echo round(((15 - ($available_beds ?? 15)) / 15) * 100); ?>%</small>
                    </div>
                    <div style="height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                        <div style="height: 100%; width: <?php echo round(((15 - ($available_beds ?? 15)) / 15) * 100); ?>%; background: linear-gradient(90deg, #6366f1, #a855f7); border-radius: 4px; transition: width 1s ease;"></div>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 0.82rem;">
                    <p class="mb-2"><i class="fas fa-server me-2"></i> الإصدار: 2.0.0</p>
                    <p class="mb-0"><i class="fas fa-clock me-2"></i> آخر تحديث: <?php echo date('Y/m/d'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>
