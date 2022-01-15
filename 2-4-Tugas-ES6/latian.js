class Clock {

    constructor({ template }){
        this._template = template
        this._timer
    }

    render() {
        var date = new Date();

        var hours = date.getHours();
        if (hours < 10) hours = '0' + hours;

        var mins = date.getMinutes();
        if (mins < 10) mins = '0' + mins;

        var secs = date.getSeconds();
        if (secs < 10) secs = '0' + secs;

        var output = this._template
        .replace('h', hours)
        .replace('m', mins)
        .replace('s', secs);

        console.log(output);
    }

    stop() {
        clearInterval(timer);
    };

    start() {
        this.render();
        this._timer = setInterval(() => this.render(), 1000)
    };

}

// function di atas diubah menjadi struktur class seperti berikut:

var clock = new Clock({template: 'h:m:s'});
clock.start();  