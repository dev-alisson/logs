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
     * Logs
     */
    $.ajax({
        /**
         * Method
         */
        type: 'get',

        /**
         * URL
         */
        url: '/admin/logs',

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
            new Chart($('#chartLogs01'), {
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
                    labels: ['Critical', 'Warning', 'Erro', 'Info'],

                    /**
                     * Columns
                     */
                    datasets: [
                        /**
                         * Sales
                         */
                        {
                            label: 'Vendas',
                            backgroundColor: "#2d3349",
                            data: [15, 25, 30, 60, 90]
                        },

                        /**
                         * Revenues
                         */
                        {
                            label: 'Receitas',
                            backgroundColor: "#99cfc1",
                            data: [90, 60, 30, 25, 15]
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
                    maintainAspectRatio: false
                }
            });

            /**
             * Chart
             */
            new Chart($('#chartLogs02'), {
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
                    labels: ['Critical', 'Warning', 'Erro', 'Info'],

                    /**
                     * Columns
                     */
                    datasets: [
                        /**
                         * Sales
                         */
                        {
                            label: 'Vendas',
                            backgroundColor: "#2d3349",
                            data: [15, 25, 30, 60, 90]
                        },

                        /**
                         * Revenues
                         */
                        {
                            label: 'Receitas',
                            backgroundColor: "#99cfc1",
                            data: [90, 60, 30, 25, 15]
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
                    maintainAspectRatio: false
                }
            });
        }
    });
});
