# exile_lgsm
Modifyd version of LGSM from Daniel Gibbs (dgibbs64) for Exilemod
https://github.com/dgibbs64/linuxgsm

-----------------------------------------------------------

<h2>This version is not compatible with LGSM !</h2>

It's optimized & preconfigured to run a exileserver on linux.

-----------------------------------------------------------
<h2>Main features</h2>
<ul>
	<li>Backup</li>
	<li>Console</li>
	<li>Details</li>
	<li>Installer (SteamCMD)</li>
	<li>Monitor (including email notification)</li>
	<li>Update (SteamCMD)</li>
	<li>Start/Stop/Restart server</li>
	<li>Announce Server Restarts / Arma 3 Server Updates automatically</li>
</ul>


<h2>Requirements too run</h2>
Ubuntu 64bit
  <code>sudo apt-get install tmux php5 php5-cgi spawn-fcgi lib32gcc1 libstdc++6 libstdc++6:i386 libtbb2:i386</code>

Ubuntu 32bit 
  <code>sudo apt-get install tmux php5 php5-cgi spawn-fcgi libstdc++6 libtbb2</code>

Email Notification
  <code>sudo apt-get install  mailutils postfix</code>
  
-----------
Cent OS 64bit
  <code>yum install tmux php5 php5-cgi spawn-fcgi glibc.i686 libstdc++ libstdc++.i686 libtbb2:i386</code>
  
Cent OS 32bit
   <code>yum install tmux php5 php5-cgi spawn-fcgi libstdc++ libtbb2</code>
   
Email Notification
  <code>sudo apt-get install mailx postfix</code>
   
-----------
Debian 64bit
<code>sudo dpkg --add-architecture i386; sudo apt-get update; sudo apt-get install tmux php5 php5-cgi spawn-fcgi ca-certificates lib32gcc1 libstdc++6 libstdc++6:i386 libtbb2:i386</code>

Debian 32bit
<code>sudo apt-get install tmux php5 php5-cgi spawn-fcgi ca-certificates libstdc++6 libtbb2:i386</code>

Email Notification
  <code>sudo apt-get install mailutils postfix</code>


<h2>Installation</h2>

1. Create a user and login.
<pre>adduser exileserver</pre>
<pre>passwd exileserver</pre>
<pre>su - exileserver</pre>

2. Download the script.
<pre> wget -O exileserver https://raw.githubusercontent.com/Kugane/exile_lgsm/master/exileserver</pre>

3. Make it executable.
<pre>chmod +x exileserver</pre>

4. Add Steam login details.
<pre>You will need to enter a Steam username and password to download ARMA 3 dedicated server.</pre>
<pre>It is recommended that you <a href="https://store.steampowered.com/login/">create a new Steam username</a> just for the server.</pre>
<pre>nano exileserver</pre>
<pre># Steam login<br>steamuser="username"<br>steampass="password"</pre>

5. Run the installer and follow the instructions.
<pre>./exileserver install</pre>

</div>



<h2>FAQ</h2>
Show the lgsm thread or my exileforum thread
- https://github.com/dgibbs64/linuxgsm/wiki/FAQ
- comming soon
