import { debounce } from '../utils/helpers'
import { tween } from '../utils/tween'
export default class {
    constructor() {
        this.radius = null;
        this.options = null;
        this.canvas = null;
        this.ctx = null;
        this.oldPercent = 0;
        this.showing = false;
        this.btn = null;
        this.dimensions = null;
    }
    
    init(){
        this.btn = document.getElementById('js-scroll-to-top');
        this.btn.addEventListener("click", function(){
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // let el = document.getElementById('progress-circle'); // get canvas
        // this.canvas = document.createElement('canvas');
        // el.appendChild(this.canvas);
        // if (typeof(G_vmlCanvasManager) !== 'undefined') {
        //     G_vmlCanvasManager.initElement(this.canvas);
        // }

        this.canvas = document.getElementById('progress-circle');

        this.options = {
            // percent:  el.getAttribute('data-percent') || 25,
            size:  100,
            lineWidth: 4,
            rotate: 0
        }


        // this.dimensions = getObjectFitSize(
        //     true,
        //     this.canvas.clientWidth,
        //     this.canvas.clientHeight,
        //     this.canvas.width,
        //     this.canvas.height
        // );
        this.canvas.width = this.canvas.height = this.options.size;
        this.ctx = this.canvas.getContext('2d');

        this.ctx.translate(this.options.size / 2, this.options.size / 2); // change center
        this.ctx.rotate((-1 / 2 + this.options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        this.radius = (this.options.size - this.options.lineWidth) / 2;

        window.addEventListener("resize", debounce(() => {
            this.updateProgress();
        },200));

        window.addEventListener("scroll", debounce(() => {
            this.updateProgress();
          },200));
    }


    updateProgress(){
        let scrollTop = window.scrollY;
        //Show arrow button after x distance from top
        if(!this.showing && scrollTop > 100 ){
            this.showing = true;
            this.btn.classList.toggle('show');
        } else if(this.showing && scrollTop <= 100){
            this.showing = false;
            this.btn.classList.toggle('show');
        }

        let docHeight = document.body.offsetHeight;
        let winHeight = window.innerHeight;
        let newPercent = scrollTop / (docHeight - winHeight);

        if(this.oldPercentage !== newPercent){
            tween({
                from:this.oldPercent,
                to:newPercent,
                duration:500,
                onUpdate: (v) => this.updateTween(v)
            });
            this.oldPercent = newPercent;
        }
        
    }

    updateTween(v){
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.drawCircle('#7b7b7b', this.options.lineWidth, 1);
        if(v > 0){
            this.drawCircle('#5AD3D8', this.options.lineWidth, v );
        }
    }

    drawCircle(color, lineWidth, percent) {
        percent = Math.min(Math.max(0, percent || 1), 1);
        this.ctx.beginPath();
        this.ctx.arc(0, 0, this.radius, 0, Math.PI * 2 * percent, false);
        this.ctx.strokeStyle = color;
        this.ctx.lineCap = 'square'; // butt, round or square
        this.ctx.lineWidth = lineWidth
        this.ctx.stroke();
    };
}
