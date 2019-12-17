<head>
    <title>@yield('page_title', 'Default Title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        .user_table tbody tr th {
            background: #337ab7;
            color: #ffff;
        }

        .outer_div {
            background: #eee;
            margin-left: 28px;
        }

        .drop_cls {
            width: 600px;
            height: 40px;
            background: #ffffff;
        }

        .no_record {
            background: #337ab7;
            text-align: center;
            color: #ffff;
        }

        .new_div {
            margin-top: 40px;
        }


        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>

</head>