This is a Bootstrap based GUI for the popular [rtorrent client](https://github.com/rakshasa/rtorrent).
It is intended for mobile usage, as a lightweight PHP alternative to the [heavy and old-school looking ruTorrent](https://github.com/Novik/ruTorrent/) and the [mobile-unfriendly, node-based Flood](https://github.com/jfurrow/flood)

![screenshot](https://raw.githubusercontent.com/SjonHortensius/WebRTorrent/gh-pages/screenshot.png)

Instructions
============

Install rtorrent and run it (for example) in a screen. Enable `scgi` by making sure this is in your `.rtorrent.rc`:

```
 network.scgi.open_port = "127.0.0.1:5000"
```

Clone this repository, and copy `config.sample.php` to `config.php`, customize it if needed:

```
git clone --recursive https://github.com/SjonHortensius/WebRTorrent
cd WebRTorrent; cp config.sample.php config.php
```

Now point your web browser to the directory where you cloned; and you should be ready to go.