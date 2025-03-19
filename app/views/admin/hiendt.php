<div class="dashboard-box">
    <?php if (empty($salesData)) { ?>
        <p>Không có dữ liệu doanh thu.</p>
    <?php } else { ?>
        <?php foreach ($salesData as $sale) { ?>
            <div class="box">
                <h3>Doanh thu tháng <?php echo $sale['thang']; ?> - <?php echo $sale['nam']; ?></h3>
                <p><?php echo number_format($sale['doanhThu'], 0, ',', '.'); ?> VND</p>
            </div>
        <?php } ?>
    <?php } ?>
</div>
