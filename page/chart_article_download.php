
<?php
$rs = $conn->query("select YEAR(date_full),MONTH(date_full),count(id) 
            from count_open_full WHERE id_article=$id_article GROUP BY YEAR(date_full), MONTH(date_full) ORDER BY date_full DESC limit 12");
$year = array();
$mon = array();
$count = array();
while ($row = $rs->fetch_array()) {
    if ($row["MONTH(date_full)"] == '1') {
        $row["MONTH(date_full)"] = "มกราคม";
    }
    if ($row["MONTH(date_full)"] == '2') {
        $row["MONTH(date_full)"] = "กุมภาพันธ์";
    }
    if ($row["MONTH(date_full)"] == 3) {
        $row["MONTH(date_full)"] = "มีนาคม";
    }
    if ($row["MONTH(date_full)"] == '4') {
        $row["MONTH(date_full)"] = "เมษายน";
    }
    if ($row["MONTH(date_full)"] == '5') {
        $row["MONTH(date_full)"] = "พฤษภาคม";
    }
    if ($row["MONTH(date_full)"] == '6') {
        $row["MONTH(date_full)"] = "มิถุนายน";
    }
    if ($row["MONTH(date_full)"] == '7') {
        $row["MONTH(date_full)"] = "กรกฎาคม";
    }
    if ($row["MONTH(date_full)"] == '8') {
        $row["MONTH(date_full)"] = "สิงหาคม";
    }
    if ($row["MONTH(date_full)"] == '9') {
        $row["MONTH(date_full)"] = "กันยายน";
    }
    if ($row["MONTH(date_full)"] == '10') {
        $row["MONTH(date_full)"] = "ตุลาคม";
    }
    if ($row["MONTH(date_full)"] == '11') {
        $row["MONTH(date_full)"] = "พฤศจิกายน";
    }
    if ($row["MONTH(date_full)"] == '12') {
        $row["MONTH(date_full)"] = "ธันวาคม";
    }

    array_push($year, $row["YEAR(date_full)"]);
    array_push($mon, $row["MONTH(date_full)"]);
    array_push($count, $row["count(id)"]);
}

?>

<!--คนเข้าชม -->
<script type="text/javascript">
    $(function() {
        Highcharts.chart('container_full', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'ย้อนหลัง 12 เดือน'
            },
            xAxis: {
                categories: ['<?= implode("','", $mon); ?>'],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวน'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} ครั้ง',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'ดาวน์โหลดฉบับเต็ม',
                data: [<?= implode(',', $count) ?>],
                color: '#117A65',
            }],
            credits: {
                enabled: false
            },
        });
    });
</script>
</body>

</html>