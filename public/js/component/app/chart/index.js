var ctx = $('#myChart');
$(function () {
    var d = new Date();
    var n = d.getFullYear();
    date = '1-1-' + n + '';
    $('#calendar-start').datetimepicker({
        // viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        minDate: date,
        maxDate: '12-31-' + n + '',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
    $('#calendar-end').datetimepicker({
        // viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        minDate: date,
        maxDate: '12-31-' + n + '',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
    getdata()
})
var myChart=null;
function drawchart(config) {
    if(myChart!=null){
        myChart.destroy();
    }
    myChart = new Chart(ctx, config)
}

function getdata() {
    var datestart = $('#calendar-start').val(),
        dateend = $('#calendar-end').val();
    $.ajax({
        type: 'get',
        url: '/chart.getdata',
        data: {datestart: datestart, dateend: dateend}
    }).then(function (res) {
        console.log(res)
        if(res!=""){
            loadtable(res[2])
            let data = {
                type: 'bar',
                data: {
                    labels: res[1],
                    datasets: res[0]
                },
                options: {
                    legend: {
                        display: true,
                        align: 'center'
                    },
                    title: {
                        display: true,
                        text: 'Thống kê'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            };
            drawchart(data)
        }
        // myChart = new Chart(ctx,config)

    })
}

$('#calendar-start').on('dp.change', function () {
    valuestart = $(this).val()
    monthstart = valuestart.substr(0, 2);
    valueend = $('#calendar-end').val()
    monthend = valueend.substr(0, 2);
    if (monthstart > monthend) {
        text = 'Ngày bắt đầu không được lớn hơn ngày cuối';
        ErrorNotify(text)
        $(this).val(valueend)
        getdata()
        return false;
    } else {
        getdata()
    }
})
$('#calendar-end').on('dp.change', function () {
    valuestart = $(this).val()
    monthstart = valuestart.substr(0, 2);
    valueend = $('#calendar-start').val()
    monthend = valueend.substr(0, 2);
    if (monthstart < monthend) {
        text = 'Ngày cuối không được nhỏ hơn ngày đầu';
        ErrorNotify(text)
        $(this).val(valueend)
        getdata()
        return false;
    } else {
        getdata()
    }
})
function loadtable(data) {
    table = $('#loinhuantb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data.original.data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'thang', className: 'text-center'},
            {data: 'thu' , className: 'text-center'},
            {data: 'chi' , className: 'text-center'},
            {data: 'loinhuan', className: 'text-center'},
            // {data: 'trangthai', name: 'tenlop', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
