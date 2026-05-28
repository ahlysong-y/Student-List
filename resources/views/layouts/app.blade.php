<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ប្រព័ន្ធគ្រប់គ្រងទិន្នន័យសិស្ស</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script defer src="/_vercel/insights/script.js"></script>
    <style>
        body {
            font-family: 'Kantumruy Pro', sans-serif;
        }

    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <!-- SweetAlert2 Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Flash message toast for add/update/delete success
            const Toast = Swal.mixin({
                toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
                , timerProgressBar: true
                , didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            @if(session('success'))
            Toast.fire({
                icon: 'success'
                , title: '{{ session("success") }}'
            });
            @endif

            @if(session('error'))
            Toast.fire({
                icon: 'error'
                , title: '{{ session("error") }}'
            });
            @endif

            // Delete confirmation alert animation
            const deleteForms = document.querySelectorAll('form[action*="destroy"], form[onsubmit*="confirm"]');
            deleteForms.forEach(form => {
                form.removeAttribute('onsubmit'); // Remove default confirm
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'តើអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនទេ?'
                        , text: "អ្នកនឹងមិនអាចយកទិន្នន័យនេះមកវិញបានទេ!"
                        , icon: 'warning'
                        , showCancelButton: true
                        , confirmButtonColor: '#4f46e5', // Indigo-600
                        cancelButtonColor: '#ef4444', // Red-500
                        confirmButtonText: 'បាទ/ចាស, លុបវា!'
                        , cancelButtonText: 'បោះបង់'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });

    </script>
</body>
</html>
