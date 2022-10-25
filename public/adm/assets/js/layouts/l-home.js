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
     * Sales
     */
    $.ajax({
        /**
         * Method
         */
        type: 'get',

        /**
         * URL
         */
        url: '/admin/sales',

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
            new Chart($('#chartSellers'), {
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
                    labels: data.sellers,

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
                            data: data.sales
                        },

                        /**
                         * Revenues
                         */
                        {
                            label: 'Receitas',
                            backgroundColor: "#99cfc1",
                            data: data.revenues
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
