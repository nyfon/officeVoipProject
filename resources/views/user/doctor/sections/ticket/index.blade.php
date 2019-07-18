@extends('user.doctor.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										سوالات پاسخ داده شده
									</span>
                                </div>
                                <div class="count-stat">{{ $countTicket['answered'] }}
                                    <span class="indicator positive">عدد</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
										سوالات خوانده شده
									</span>
                                </div>
                                <div class="count-stat">{{ $countTicket['read'] }}
                                    <span class="indicator positive">عدد</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-content">
                        <ul class="statistics-list-count">
                            <li>
                                <div class="points">
									<span>
                                        سوالات خوانده نشده
									</span>
                                </div>
                                <div class="count-stat">{{ $countTicket['unread'] }}
                                    <span class="indicator positive">عدد</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('doctor.ticket.crate') }}" class="btn btn-primary">افزودن</a>

        <div class="row">
            <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">بازدهی</h6>
                    </div>
                    <div class="ui-block-content">
                        <canvas id="chartTicket" chartValueRead="{{ $countTicket['read'] }}" chartValueUnread="{{ $countTicket['unread'] }}" chartValueAnswered="{{ $countTicket['answered'] }}"
                                width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col col-xl-9 order-xl-2 col-lg-6 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">لیست سوالات</h6>
                    </div>
                    <div class="ui-block-content">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>وضعیت</th>
                                <th>فوریت</th>
                                <th>تاریخ ارسال سوال</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td><a href="{{ route('doctor.ticket.show', $ticket) }}">{{ $ticket->title }}</a></td>
                                    <td>{{ str_limit($ticket->content,80,'. . .') }}</td>
                                    <td>{{ $ticket->isStatus() }}</td>
                                    <td>{{ $ticket->isUrgency() }}</td>
                                    <td>{{ $ticket->faData($ticket->created_at) }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>عنوان</th>
                                <th>متن</th>
                                <th>وضعیت</th>
                                <th>فوریت</th>
                                <th>تاریخ</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </div>




@endsection
@section('js')

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        let chartValueRead = $('#chartTicket').attr('chartValueRead');
        let chartValueUnread = $('#chartTicket').attr('chartValueUnread');
        let chartValueAnswered = $('#chartTicket').attr('chartValueAnswered');

        function chartTicketFun(read, unread, answered) {
            new Chart(document.getElementById("chartTicket"), {
                "type": "doughnut",
                "data": {
                    "labels": ["خوانده شده", "خوانده نشده", "پاسخ داده شده"],
                    "datasets": [{
                        "label": "My First Dataset",
                        "data": [read, unread, answered],
                        "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(8, 221, 193)"]
                    }]
                }
            });
        }

        chartTicketFun(chartValueRead, chartValueUnread, chartValueAnswered);

        $(document).ready(function () {
            $('#example').DataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "aoColumnDefs": [
                    {"bSortable": false, "aTargets": [0]},
                ],
                "aLengthMenu": [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "iDisplayLength": 25,
                "oTableTools": {
                    "aButtons": [],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                    "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                    "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                    "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "نمایش _MENU_ رکورد",
                    "sLoadingRecords": "در حال بارگزاری...",
                    "sProcessing": "در حال پردازش...",
                    "sSearch": "جستجو:",
                    "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                    "oPaginate": {
                        "sFirst": "ابتدا",
                        "sLast": "انتها",
                        "sNext": "بعدی",
                        "sPrevious": "قبلی"
                    },
                    "oAria": {
                        "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                        "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                    },
                    "search": "جست جو : ",
                }
            });
        });
    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style>
        .dataTables_length label {
            display: inline-flex;
        }

        .dataTables_length label select {
            padding: 3px;
            margin: 0px 8px;
        }

        #example_filter label input {
            padding: 4px;
        }

        .row .DTTTFooter {
            margin-top: 15px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
        }

        .current {
            background: #4527a0 !important;
            border-radius: 10px !important;
            color: #fff !important;
            border: 0 !important;
        }

    </style>

@endsection

