<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900');
		*{
			font-family: 'Raleway', sans-serif;
		}

        .card{
            width: 98%;
            margin: 44px auto;
            background: #EEEEEE;
            border: 1px solid #ff084e;
            border-radius: 15px;
        }

        .card-header{
            background: #ff084e;
            font-weight: bold;
            padding: 20px;
            color: #ffffff;
            border-radius: 15px 15px 0px 0px;
            font-size: 16px;
            text-align: center;
            text-transform: uppercase;
        }

        .card-body{
            padding: 40px 30px;
            background: #fff;
            height: 100%;
            border-radius: 0px 0px 15px 15px;
        }
		.card-body h2{
            text-align: center;
			color: #565656;
			margin-top: 0px;
			margin-bottom: 0px;
        }
		.card-body p{
			margin-bottom: 40px;
            margin-top: 10px;
            font-size: 16px;
        }
		.card-body .email, .card-body .password{
			text-align: center;
		}
		.card-body .email h4, .card-body .password h4 {
			color: #666;
			margin-bottom: 10px;
		}
		.card-body .email .email-address h3, .card-body .password .temp-pass h3 {
			margin: 0px;
		}
		.card-body .email .email-address, .card-body .password .temp-pass {
			background: #eeefff;
			padding: 15px;
		}
		.card-body .login-page-btn{
			text-align: center;
			margin-top: 20px;
			padding-top: 20px;
		}
		.card-body .login-page-btn a{
			text-decoration: none;
			text-transform: uppercase;
			font-weight: 800;
			padding: 16px 25px;
			color: #fff;
			background: #ff084e;
			border-radius: 5px;
		}
    </style>
</head>
<body>
    @php
    $app_name = ucap_get('app_name') ?? 'UCAP';
    @endphp
    <section class="email-template">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{ $app_name }}
                        </div>
                        <div class="card-body">
							          <h2>{{ __('Contact By ') .$data->name}}</h2>
                            <div class="email">
                              <h4>{{ __('Name') }} </h4>
                              <div class="email-address">
                                <h3>{{ $data->name }}</h3>
                              </div>
                            </div>
                            <div class="email">
                              <h4>{{ __('Email') }} </h4>
                              <div class="email-address">
                                <h3>{{ $data->email }}</h3>
                              </div>
                            </div>
                            <div class="email">
                              <h4>{{ __('number') }} </h4>
                              <div class="email-address">
                                <h3>{{ $data->number }}</h3>
                              </div>
                            </div>
                            <div class="email">
                              <h4>{{ __('subject') }} </h4>
                              <div class="email-address">
                                <h3>{{ $data->subject }}</h3>
                              </div>
                            </div>
                            <div class="email">
                              <h4>{{ __('message') }} </h4>
                              <div class="email-address">
                                <p>{{ $data->message }}</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
