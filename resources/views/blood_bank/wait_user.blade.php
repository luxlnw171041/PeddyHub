@extends('layouts.peddyhub')

@section('content')

    <style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #b8205b;
          width: 70px;
          height: 70px;
          -webkit-animation: spin 2s linear infinite; 
          animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 60px #7ac142
            }
        }
    </style>

    <!-- modal wait user -->
    <button id="btn_wait_user" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#wait_user">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="wait_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <center>
                        <br><br>
                        <img width="60%" src="{{ url('peddyhub/images/PEDDyHUB sticker line/15.png') }}">
                        <br>
                        <div class="loader"></div>
                        <br>
                        <span>
                            <b>กำลังรอการยืนยัน</b>
                        </span>
                        <br><br>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- modal user CF -->
    <button id="btn_user_cf" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#user_cf">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="user_cf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="wrapper">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <h3 style="color: #7ac142;">บันทึกข้อมูลเรียบร้อยแล้ว</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        document.querySelector('#btn_wait_user').click();
        send_data_to_user();
    });

    function send_data_to_user()
    {
        let location = "{{ $requestData['location'] }}" ;
        let user_id = {{ $requestData['user_id'] }} ;
        let pet_id = {{ $requestData['pet_id'] }} ;
        let quantity = {{ $requestData['quantity'] }} ;
        let data_blood_id = {{ $data_blood_id }} ;

        // console.log(location);
        // console.log(user_id);
        // console.log(pet_id);
        // console.log(quantity);

        // ส่งไลน์
        let data = {
            "location" : location,
            "user_id" : user_id,
            "pet_id" : pet_id,
            "quantity" : quantity,
            "data_blood_id" : data_blood_id,
        };

        fetch("{{ url('/') }}/api/send_data_to_user", {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response){
                return response.text();
            }).then(function(text){
                // console.log(text);
            }).catch(function(error){
                // console.error(error);
            });

            check_data_blood_id();
    }

    function check_data_blood_id()
    {
        console.log("check_data_blood_id");
    }

</script>

@endsection
