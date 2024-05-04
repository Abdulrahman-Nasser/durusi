@extends('layouts.app')
@section('title', 'Api | End points')
@section('content')

    <style>
        .endpoint {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .add-button {
            margin-top: 20px;
            text-align: center;
        }

        .add-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-button a:hover {
            background-color: #0056b3;
        }

        /* Media Query for Responsive Design */
        @media only screen and (max-width: 768px) {
            .endpoint {
                padding: 32px 10px;
                width: 609px;
            }


        }
    </style>
    <div class="endpoint">
        <h2>Endpoints Page</h2>
        <table>
            <tr>
                <th>Endpoint Name</th>
                <th>Description</th>
                <th>Method</th>

            </tr>
            <tr>
                <td>https://durusionline.com/api/register</td>
                <td>Create New User</td>
                <td>Post</td>

            </tr>
            <tr>
                <td>https://durusionline.com/api/login</td>
                <td>login</td>
                <td>Post</td>

            </tr>
            <tr>
                <td>https://durusionline.com/api/logout</td>
                <td>loging out</td>
                <td>get</td>

            </tr>
            <tr>
                <td>https://durusionline.com/api/logout</td>
                <td>login-guest</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/selectLevel</td>
                <td>Select group by level Name</td>
                <td>Post</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/selectGroupDetalis/1</td>
                <td>Select group Details</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/videos</td>
                <td>Add New video</td>
                <td>Post</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/videos</td>
                <td>get all videos</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/videos/1714787129_3999351-uhd_3840_2160_24fps.mp4</td>
                <td>Get one video by name</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/units</td>
                <td>Get all units</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/units</td>
                <td>Add new unit</td>
                <td>post</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/questions</td>
                <td>Get all questions</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/questions</td>
                <td>Add new question</td>
                <td>post</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/teachers</td>
                <td>Get all teachers</td>
                <td>get</td>
            </tr>
            <tr>
                <td>https://durusionline.com/api/teachers</td>
                <td>Add New teacher</td>
                <td>post</td>
            </tr>

        </table>

    </div>
@endsection
