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
     * Remove
     */

    // Active
    $('html').on('click', '.js-data-remove', function (e) {
        /**
         * Event
         */
        e.preventDefault();
        e.stopPropagation();

        /**
         * Button
         */
        let button = $(this);
        button.removeClass('js-data-remove');
        button.addClass('is-active js-data-confirm');
    });

    // Confirm
    $('html').on('click', '.js-data-confirm', function (e) {
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
         * Line
         */
        let line = button.parents('tr');

        /**
         * Route
         */
        let action = button.data('action');

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
                 * Hide
                 */
                line.fadeOut('slow', function () {
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
                });
            }
        });
    });

    /**
     * Catalog
     */

    // Active
    $('html').on('change', '.js-catalog-item', function (e) {
        /**
         * Product
         */
        let product = $(this);
        product.toggleClass('is-active');

        /**
         * Selecteds
         */
        let selecteds = $('.js-catalog-item.is-active');

        /**
         * Amount
         */
        let amount = selecteds.length;
        $('.js-catalog-resume').html(amount)

        /**
         * Verify
         */
        if (amount <= 1) {

            $('.js-catalog-variant').html('item')

        } else {

            $('.js-catalog-variant').html('itens')

        }

        /**
         * Verify
         */
        if (amount >= 1) {

            $('.js-catalog-button').prop('disabled', false).html;
            $('.js-catalog-toggle').text('Cadastrar');

        } else {

            $('.js-catalog-button').prop('disabled', true);
            $('.js-catalog-toggle').text('Adicione um produto');

        }

        /**
         * Total
         */
        let total = 0;

        /**
         * Loop
         */
        selecteds.each(function (_, product) {
            /**
             * Total
             */
            total += parseFloat($(product).data('price'));
        });

        /**
         * Append
         */
        $('.js-catalog-total').html(
            /**
             * Convert
             */
            total
                .toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
                .replace('R$', 'R$ ')
        )
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
});
