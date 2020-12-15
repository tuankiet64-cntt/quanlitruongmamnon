var ctx = $('#myChart');
$(function () {
    var d = new Date();
    var n = d.getFullYear();
    date='1-1-'+n+'';
    $('#calendar-start').datetimepicker({
        // viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        minDate:date,
        maxDate:'12-31-'+n+'',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
    $('#calendar-end').datetimepicker({
        // viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        minDate:date,
        maxDate:'12-31-'+n+'',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
    loadchart()
})
function loadchart() {
    var datestart=$('#calendar-start').val(),
        dateend=$('#calendar-end').val();
    $.ajax({
        type:'get',
        url:'/chart.getdata',
        data:{datestart:datestart,dateend:dateend}
    }).then(function (res) {
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: res[1],
                datasets: res[0]
            },
            options: {
                legend:{
                    display: true,
                    align:'center'
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
        });
        $('#calendar-start').on('dp.change',function () {
            valuestart=$(this).val()
            monthstart=valuestart.substr(0,2);
            valueend=$('#calendar-end').val()
            monthend=valueend.substr(0,2);
            if(monthstart>monthend){
                text='Ngày bắt đầu không được lớn hơn ngày cuối';
                ErrorNotify(text)
                $(this).val(valueend)
                return false;
            }else{
                myChart.destroy()
                loadchart()
            }

        })
        $('#calendar-end').on('dp.change',function () {
            valuestart=$(this).val()
            monthstart=valuestart.substr(0,2);
            valueend=$('#calendar-start').val()
            monthend=valueend.substr(0,2);
            if(monthstart<monthend){
                text='Ngày cuối không được nhỏ hơn ngày đầu';
                ErrorNotify(text)
                $(this).val(valueend)
                return false;
            }else{
                myChart.destroy()
                loadchart()
            }
        })
    })
}

