<template>
    <div class="flex flex-col">
        <div class="grid grid-cols-3 m-8">
            <client-only>
                <line-chart :data="datacollection"></line-chart>
            </client-only>
            <client-only>
                <pie-chart :data="datacollection"></pie-chart>
            </client-only>
            <client-only>
                <bar-chart :data="datacollection"></bar-chart>
            </client-only>
        </div>
        <div class="grid grid-cols-3">
            <client-only>
                <line-chart :data="months" :options="options"></line-chart>
            </client-only>
        </div>
    </div>
</template>

<script>
    export default {
        layout: 'admin',
    
    data () {
      return {
        datacollection: null,
        months: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July"
        ],
        datasets: [
          {
            label: "Sales",
            data: [2, 10, 5, 9, 0, 6, 20],
            backgroundColor: 'transparent',
            borderColor: "rgba(1, 116, 188, 0.50)",
            pointBackgroundColor: "rgba(171, 71, 188, 1)"
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        title: {
          display: true,
          text: "Sales in months"
        }
      },
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
        fillData () {
        this.datacollection = {
          labels: ['Label One', 'Label Two', 'Label Three'],
          type: 'line',
          datasets: [
            {
              label: '2019',
              backgroundColor: '#30256e',
              data: [this.getInt(), 21, 43]
            }, {
              label: '2020',
              backgroundColor: '#cd5c5c',
              data: [83, 43, 50]
            }, {
              label: '2020',
              backgroundColor: '#409440',
              data: [2, 13, 21]
            }
          ]
        }
      },
        getInt () {
        return 30
      }
    }
    }
</script>

<style scoped>
</style>