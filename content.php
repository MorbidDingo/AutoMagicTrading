<div class="content-home-pg" id="charting">
</div>


<script>
    const log = console.log;

const chartProperties = {
  width:1500,
  height:600,
  timeScale:{
    timeVisible:true,
    secondsVisible:false,
  }
}

const domElement = document.getElementById('tvchart');
const chart = LightweightCharts.createChart(domElement,chartProperties);
const candleSeries = chart.addCandlestickSeries();


fetch(`https://finance.yahoo.com/quote/DOGE-USD?p=DOGE-USD&.tsrc=fin-srch`)
  .then(res => res.json())
  .then(data => {
    const cdata = data.map(d => {
      return {time:d[0]/1000,open:parseFloat(d[1]),high:parseFloat(d[2]),low:parseFloat(d[3]),close:parseFloat(d[4])}
    });
    candleSeries.setData(cdata);
  })
  .catch(err => log(err))

//Dynamic Chart
const socket = io.connect('http://127.0.0.1:3306/');

socket.on('KLINE',(pl)=>{
  //log(pl);
  candleSeries.update(pl);
});

</script>
</body>
</html>