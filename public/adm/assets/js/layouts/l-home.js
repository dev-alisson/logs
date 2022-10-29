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
     * Charts
     */
    $.ajax({
        /**
         * Method
         */
        type: 'get',

        /**
         * URL
         */
        url: '/admin/charts',

        /**
         * Headers
         */
        headers: { 'X-CSRF-TOKEN': csrf },

        /**
         * Success
         */
        success: function (data) {
            /**
             * Chart
             */
            new Chart($('#chartByConsumers'), {
                /**
                 * Type
                 */
                type: 'bar',

                /**
                 * Data
                 */
                data: {
                    /**
                     * Labels
                     */
                    labels: data.namesConsumers,

                    /**
                     * Columns
                     */
                    datasets: [
                        /**
                         * Proxy
                         */
                        {
                            label: 'Proxy',
                            backgroundColor: "#99cfc1",
                            data: data.proxysConsumers
                        },

                        /**
                         * Gateway
                         */
                        {
                            label: 'Gateway',
                            backgroundColor: "#eab94a",
                            data: data.gatewaysConsumers
                        },

                        /**
                         * Request
                         */
                        {
                            label: 'Request',
                            backgroundColor: "#2d3349",
                            data: data.requestsConsumers
                        }
                    ],
                },

                /**
                 * Options
                 */
                options: {
                    /**
                     * Responsive
                     */
                    responsive: true,

                    /**
                     * Ratio
                     */
                    maintainAspectRatio: false,

                    /**
                     * Plugins
                     */
                    plugins: {
                        /**
                         * Title
                         */
                        title: {
                            /**
                             * Display
                             */
                            display: true,

                            /**
                             * Text
                             */
                            text: 'Gráfico por consumidores'
                        }
                    }
                }
            });

            /**
             * Chart
             */
            new Chart($('#chartByServices'), {
                /**
                 * Type
                 */
                type: 'bar',

                /**
                 * Data
                 */
                data: {
                    /**
                     * Labels
                     */
                    labels: data.namesServices,

                    /**
                     * Columns
                     */
                    datasets: [
                        /**
                         * Proxy
                         */
                        {
                            label: 'Proxy',
                            backgroundColor: "#99cfc1",
                            data: data.proxysServices
                        },

                        /**
                         * Gateway
                         */
                        {
                            label: 'Gateway',
                            backgroundColor: "#eab94a",
                            data: data.gatewaysServices
                        },

                        /**
                         * Request
                         */
                        {
                            label: 'Request',
                            backgroundColor: "#2d3349",
                            data: data.requestsServices
                        }
                    ],
                },

                /**
                 * Options
                 */
                options: {
                    /**
                     * Responsive
                     */
                    responsive: true,

                    /**
                     * Ratio
                     */
                    maintainAspectRatio: false,

                    /**
                     * Plugins
                     */
                    plugins: {
                        /**
                         * Title
                         */
                        title: {
                            /**
                             * Display
                             */
                            display: true,

                            /**
                             * Text
                             */
                            text: 'Gráfico por serviços'
                        }
                    }
                }
            });
        }
    });
});
