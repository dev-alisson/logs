$(function () {
    /**
     * Meta
     */
    const meta = $('meta[name="csrf-token"]');

    /**
     * CSRF
     */
    const csrf = meta.attr('content')

    /**
     * Password
     */
    $('html').on('click', '.js-password-view', function (e) {
        /**
         * Icon
         */
        let icon = $(this);

        /**
         * Field
         */
        let field = $('.js-password-file');

        /**
         * Type
         */
        let type = field.attr('type');

        /**
         * Verify
         */
        if (type == 'password') {
            /**
             * Text
             */
            field.prop('type', 'text');

            /**
             * Hide
             */
            icon.removeClass('ri-eye-off-line');

            /**
             * View
             */
            icon.addClass('ri-eye-line');
        } else {
            /**
             * Password
             */
            field.prop('type', 'password');

            /**
             * Hide
             */
            icon.removeClass('ri-eye-line');

            /**
             * View
             */
            icon.addClass('ri-eye-off-line');
        }
    });

    /*
    Logout
    */
    $('html').on('click', '.js-logout', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Ajax
         */
        $.ajax({
            /**
             * Method
             */
            type: 'post',

            /**
             * Route
             */
            url: '/logout',

            /**
             * Headers
             */
            headers: { 'X-CSRF-TOKEN': csrf },

            /**
             * Success
             */
            success: function (data) {
                /**
                 * Toast
                 */
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                })

                /**
                 * Message
                 */
                Toast.fire({
                    icon: 'success',
                    title: 'Deslogando...'
                })

                /**
                 * Redirect
                 */
                setTimeout(function () {
                    /**
                     * URL
                     */
                    window.location.href = '/';
                }, 1500)
            }
        });
    });

    /**
     * Ajax
     */
    $('html').on('submit', '.js-form-ajax', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Form
         */
        let form = $(this);

        /**
         * Route
         */
        let action = form.attr('action');

        /**
         * Ajax
         */
        form.ajaxSubmit({
            /**
             * Method
             */
            type: 'post',

            /**
             * Route
             */
            url: action,

            /**
             * Headers
             */
            headers: {
                /**
                 * CSRF
                 */
                'X-CSRF-TOKEN': csrf
            },

            /**
             * Type
             */
            dataType: 'json',

            /**
             * Success
             */
            success: function (data) {
                /**
                 * Toast
                 */
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                /**
                 * Verify
                 */
                if (data.error) {

                    /**
                     * Message
                     */
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    })

                } else {

                    /**
                     * Message
                     */
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    })

                }

                /**
                 * Reload
                 */
                if (data.redirect) {
                    /**
                     * Delay
                     */
                    setTimeout(function () {
                        /**
                         * URL
                         */
                        window.location.href = data.redirect;
                    }, 2000);
                }
            }
        });
    });

    /*
    Preview
    */

    $('html').on('change', '.js-file', function (e) {
        /**
         * Cover
         */
        let cover = this;

        /**
         * Validate
         */
        if (cover.files && cover.files[0]) {
            /**
             * Reader
             */
            let reader = new FileReader();

            /**
             * Load
             */
            reader.onload = function (e) {
                /**
                 * Append
                 */
                $('.js-preview')
                    .attr('src', e.target.result)
                    .fadeIn(500);
            }

            /**
             * Data
             */
            reader.readAsDataURL(cover.files[0]);
        }
    });

    /*
    Remove
    */

    // Active
    $('html').on('click', '.js-module-remove', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Button
         */
        let button = $(this);
        button.removeClass('js-module-remove');
        button.addClass('is-active js-module-confirm');
    });

    // Confirm
    $('html').on('click', '.js-module-confirm', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Button
         */
        let button = $(this);

        /**
         * Data
         */
        let data = button.data();

        /**
         * Action
         */
        let action = data.action;

        /**
         * Ajax
         */
        $.ajax({
            /**
             * Method
             */
            type: 'post',

            /**
             * Route
             */
            url: action,

            /**
             * Headers
             */
            headers: { 'X-CSRF-TOKEN': csrf },

            /**
             * Success
             */
            success: function (data) {
                /**
                 * Button
                 */
                button.parents('.js-module-item').fadeOut('fast', function () {
                    /**
                     * Message
                     */
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: data.message,
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    });

    /**
     * Logs
     */

    // Clear
    $('html').on('click', '.js-logs-clear', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Ajax
         */
        $.ajax({
            /**
             * Method
             */
            type: 'post',

            /**
             * Route
             */
            url: '/admin/logs/clear',

            /**
             * Headers
             */
            headers: { 'X-CSRF-TOKEN': csrf },

            /**
             * Success
             */
            success: function (data) {
                /**
                 * Toast
                 */
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true
                })

                /**
                 * Message
                 */
                Toast.fire({
                    icon: 'success',
                    title: data.message
                })

                /**
                 * Reload
                 */
                setTimeout(function () {
                    /**
                     * URL
                     */
                    location.reload()
                }, 900)
            }
        });
    });

    // Upload
    $('html').on('submit', '.js-logs-upload', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Progress
         */
        let progress = $('.js-progress');

        /**
         * Percente
         */
        let percent = $('.js-bar');

        /**
         * Form
         */
        let form = $(this);

        /**
         * Ajax
         */
        form.ajaxSubmit({
            /**
             * Method
             */
            type: 'post',

            /**
             * Route
             */
            url: '/admin/logs/store',

            /**
             * Headers
             */
            headers: {
                /**
                 * CSRF
                 */
                'X-CSRF-TOKEN': csrf
            },

            /**
             * Type
             */
            dataType: 'json',

            /**
             * Start
             */
            beforeSend: function () {
                progress.show('fast');
                percent.width('0%');
                percent.html('0%');
            },

            /**
             * Progress
             */
            uploadProgress: function (event, position, total, complete) {
                percent.width(complete + '%');
                percent.html(complete + '%');

                /**
                 * Complete
                 */
                if (complete == '100') {
                    /**
                     * Saving
                     */
                    percent.html('Cadastrando logs... Aguarde!');
                }
            },

            /**
             * Success
             */
            success: function (data) {
                /**
                 * Toast
                 */
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                /**
                 * Verify
                 */
                if (data.error) {

                    /**
                     * Message
                     */
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    })

                } else {

                    /**
                     * Message
                     */
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    })

                    /**
                     * Reload
                     */
                    setTimeout(function () {
                        /**
                         * URL
                         */
                        location.reload()
                    }, 2000)

                }
            },

            /**
             * Complete
             */
            complete: function (xhr) {
                progress.hide('fast');
            }
        });
    });
});
