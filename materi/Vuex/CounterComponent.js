export const CounterComponent = {
    template : `
    <div>
        <p>{{counters}}</p>
    </div>
    `,
    computed : {
        counters(){
            return this.$store.getters.counter
        }
    },
}