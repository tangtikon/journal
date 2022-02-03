<?php
include("connect.php");


$rs = $conn->query("select YEAR(date_open),MONTH(date_open),count(id) 
            from count_open WHERE id_chap=$id_chapter GROUP BY YEAR(date_open), MONTH(date_open) ORDER BY date_open DESC limit 12");
$year = array();
$mon = array();
$count = array();
while ($row = $rs->fetch_array()) {
    if ($row["MONTH(date_open)"] == '1') {
        $row["MONTH(date_open)"] = "มกราคม";
    }
    if ($row["MONTH(date_open)"] == '2') {
        $row["MONTH(date_open)"] = "กุมภาพันธ์";
    }
    if ($row["MONTH(date_open)"] == 3) {
        $row["MONTH(date_open)"] = "มีนาคม";
    }
    if ($row["MONTH(date_open)"] == '4') {
        $row["MONTH(date_open)"] = "เมษายน";
    }
    if ($row["MONTH(date_open)"] == '5') {
        $row["MONTH(date_open)"] = "พฤษภาคม";
    }
    if ($row["MONTH(date_open)"] == '6') {
        $row["MONTH(date_open)"] = "มิถุนายน";
    }
    if ($row["MONTH(date_open)"] == '7') {
        $row["MONTH(date_open)"] = "กรกฎาคม ";
    }
    if ($row["MONTH(date_open)"] == '8') {
        $row["MONTH(date_open)"] = "สิงหาคม";
    }
    if ($row["MONTH(date_open)"] == '9') {
        $row["MONTH(date_open)"] = "กันยายน  ";
    }
    if ($row["MONTH(date_open)"] == '10') {
        $row["MONTH(date_open)"] = "ตุลาคม";
    }
    if ($row["MONTH(date_open)"] == '11') {
        $row["MONTH(date_open)"] = "พฤศจิกายน   ";
    }
    if ($row["MONTH(date_open)"] == '12') {
        $row["MONTH(date_open)"] = "ธันวาคม";
    }

    array_push($year, $row["YEAR(date_open)"]);
    array_push($mon, $row["MONTH(date_open)"]);
    array_push($count, $row["count(id)"]);
}
?>

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
                text: 'จำนวนดาวน์โหลดย้อนหลัง 12 เดือน'
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
                name: 'ดาวน์โหลด',
                data: [<?= implode(',', $count) ?>],
                color: '#2E4053',
            }],
            credits: {
                enabled: false
            },
        });
    });
</script>