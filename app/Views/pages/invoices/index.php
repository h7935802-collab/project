<?php use App\Core\Application; ?>
<div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold text-dark"><i class="fas fa-file-invoice-dollar text-primary me-2"></i> الفواتير والمحاسبة</h2>
</div>

<div class="card shadow-sm border-0 rounded-4 fade-in">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3">رقم الفاتورة</th>
                        <th class="py-3">المريض</th>
                        <th class="py-3">تاريخ الإصدار</th>
                        <th class="py-3">المبلغ (غير شامل)</th>
                        <th class="py-3">الضريبة (15%)</th>
                        <th class="py-3">الإجمالي</th>
                        <th class="py-3">الحالة</th>
                        <th class="pe-4 py-3 text-end">إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($invoices)): ?>
                        <?php foreach ($invoices as $i): ?>
                        <tr>
                            <td class="ps-4 text-primary"><strong>#INV-<?php echo $i['id']; ?></strong></td>
                            <td class="fw-bold"><?php echo htmlspecialchars($i['full_name']); ?></td>
                            <td><?php echo date('Y-m-d H:i', strtotime($i['invoice_date'])); ?></td>
                            <td><?php echo $i['subtotal']; ?> ﷼</td>
                            <td><?php echo $i['vat_amount']; ?> ﷼</td>
                            <td><strong class="text-primary fs-5"><?php echo $i['total_amount']; ?> ﷼</strong></td>
                            <td>
                                <?php if($i['status'] == 'paid'): ?>
                                    <span class="badge bg-success px-3 py-2 rounded-pill"><i class="fas fa-check-circle me-1"></i> مدفوعة</span>
                                <?php else: ?>
                                    <span class="badge bg-danger px-3 py-2 rounded-pill"><i class="fas fa-times-circle me-1"></i> غير مدفوعة</span>
                                <?php endif; ?>
                            </td>
                            <td class="pe-4 text-end">
                                <?php if($i['status'] == 'unpaid'): ?>
                                    <a href="/invoices/pay?id=<?php echo $i['id']; ?>" class="btn btn-sm btn-success text-white fw-bold shadow-sm hover-card"><i class="fas fa-money-bill-wave"></i> سداد فاتورة</a>
                                <?php else: ?>
                                    <span class="text-muted"><i class="fas fa-check"></i> تم السداد</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="8" class="text-center text-muted py-5"><i class="fas fa-file-invoice fs-1 d-block mb-3 opacity-25"></i>لا توجد فواتير مصدرة حالياً.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
