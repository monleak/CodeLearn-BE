<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Koudo | Management System</title>

    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <script type="module" crossorigin src="/static/manage/js/main.82358976.js"></script>
    <link rel="stylesheet" href="/static/manage/css/main.2407fbe6.css">
</head>

<body>
    <div id="root"></div>

    <script>
        window.data_user = {
            id: 10338,
            name: "Mitchell Vu",
            email: "mitchell.vu0208@gmail.com",
            username: "mitchell.vu0208@gmail.com",
            avatar_url: "http://d1j8r0kxyu9tj8.cloudfront.net/files/16523752512Y4apy6YuHp9gcA.jpg",
        };

        window.data_react = {
            user: {
                id: 10338,
                name: "Mitchell Vu",
                email: "mitchell.vu0208@gmail.com",
                username: "mitchell.vu0208@gmail.com",
                avatar_url: "http://d1j8r0kxyu9tj8.cloudfront.net/files/16523752512Y4apy6YuHp9gcA.jpg",
                phone: null,
                dob: null,
                gender: null,
                deleted_at: null,
                created_at: "2022-04-24 13:13:53",
                updated_at: "2022-09-23 14:17:02",
                role: 0,
                google_id: "114920268424284998831",
                updated_by: null,
                deleted_by: null,
                last_session_id: "pafOHc5QavNdvMLLCQ5grIF2qhLSJaCRCnlPX6zm",
                apple_id: null,
                permissions: [],
                roles: [{
                        id: 1,
                        name: "super_admin",
                        description: "Super Admin",
                        type: "system",
                        guard_name: "web",
                        created_at: "2020-03-21 08:41:06",
                        updated_at: "2020-05-27 12:00:30",
                        order: 100,
                        pivot: {
                            model_id: 10338,
                            role_id: 1,
                            model_type: "App\\Entities\\User",
                        },
                    },
                    {
                        id: 2,
                        name: "admin",
                        description: "Admin",
                        type: "system",
                        guard_name: "web",
                        created_at: "2020-03-21 08:41:06",
                        updated_at: "2020-05-27 12:00:30",
                        order: 50,
                        pivot: {
                            model_id: 10338,
                            role_id: 2,
                            model_type: "App\\Entities\\User",
                        },
                    },
                    {
                        id: 4,
                        name: "paid_account",
                        description: "Người dùng trả phí",
                        type: "system",
                        guard_name: "web",
                        created_at: "2020-03-21 08:41:06",
                        updated_at: "2020-05-27 12:00:30",
                        order: 5,
                        pivot: {
                            model_id: 10338,
                            role_id: 4,
                            model_type: "App\\Entities\\User",
                        },
                    },
                    {
                        id: 6,
                        name: "support_student",
                        description: "Hỗ trợ học viên",
                        type: "system",
                        guard_name: "web",
                        created_at: "2020-03-30 08:33:29",
                        updated_at: "2020-05-27 12:00:30",
                        order: 20,
                        pivot: {
                            model_id: 10338,
                            role_id: 6,
                            model_type: "App\\Entities\\User",
                        },
                    },
                    {
                        id: 8,
                        name: "teacher",
                        description: "Giảng viên",
                        type: "system",
                        guard_name: "web",
                        created_at: "2020-04-07 21:45:34",
                        updated_at: "2020-05-27 12:00:30",
                        order: 40,
                        pivot: {
                            model_id: 10338,
                            role_id: 8,
                            model_type: "App\\Entities\\User",
                        },
                    },
                ],
            },
            permission: {
                create_account: true,
            },
        };
    </script>
</body>

</html>
