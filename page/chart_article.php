<?php


$rs = $conn->query("select YEAR(date_view),MONTH(date_view),count(id) 
            from count_article WHERE id_for=$id_article GROUP BY YEAR(date_view), MONTH(date_view) ORDER BY date_view DESC limit 12");
$year = array();
$mon = array();
$count = array();
while ($row = $rs->fetch_array()) {
    if ($row["MONTH(date_view)"] == '1') {
        $row["MONTH(date_view)"] = "มกราคม";
    }
    if ($row["MONTH(date_view)"] == '2') {
        $row["MONTH(date_view)"] = "กุมภาพันธ์";
    }
    if ($row["MONTH(date_view)"] == 3) {
        $row["MONTH(date_view)"] = "มีนาคม";
    }
    if ($row["MONTH(date_view)"] == '4') {
        $row["MONTH(date_view)"] = "เมษายน";
    }
    if ($row["MONTH(date_view)"] == '5') {
        $row["MONTH(date_view)"] = "พฤษภาคม";
    }
    if ($row["MONTH(date_view)"] == '6') {
        $row["MONTH(date_view)"] = "มิถุนายน";
    }
    if ($row["MONTH(date_view)"] == '7') {
        $row["MONTH(date_view)"] = "กรกฎาคม";
    }
    if ($row["MONTH(date_view)"] == '8') {
        $row["MONTH(date_view)"] = "สิงหาคม";
    }
    if ($row["MONTH(date_view)"] == '9') {
        $row["MONTH(date_view)"] = "กันยายน";
    }
    if ($row["MONTH(date_view)"] == '10') {
        $row["MONTH(date_view)"] = "ตุลาคม";
    }
    if ($row["MONTH(date_view)"] == '11') {
        $row["MONTH(date_view)"] = "พฤศจิกายน";
    }
    if ($row["MONTH(date_view)"] == '12') {
        $row["MONTH(date_view)"] = "ธันวาคม";
    }

    array_push($year, $row["YEAR(date_view)"]);
    array_push($mon, $row["MONTH(date_view)"]);
    array_push($count, $row["count(id)"]);
}

?>
<!--คนเข้าชม -->
<script type="text/javascript">
    $(function() {
        Highcharts.chart('container', {
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
                name: 'เข้าชม',
                data: [<?= implode(',', $count) ?>],
            }],
            credits: {
                enabled: false
            },
        });
    });
</script>
