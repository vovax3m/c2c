
<div align="center"><a href="http://c2c.sip64.ru/call/help" class="c2c_submit">api help</a> <a href="http://c2c.sip64.ru/call/help/form" class="c2c_submit">form help</a> <a href="http://c2c.sip64.ru/call/help/contact" class="c2c_submit">contact us</a></div>
<div align="left" style="font-family:Play, sans-serif;display:table;margin-left:25%;margin-top:2%">
	<p class="title">Sending requests</p>
	<br>
	<p>You should use that request string to authentication and calling</p>
	<p><pre>http://c2c.sip64.ru/call/make/78452740740?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	<p>Where <pre>78452740740</pre> number, you want to call. It should to begin from 8 or 7, and consist 11 digits</p>
	<p><pre>?key=1aae62012f7216e17d4890fe3a5badf0</pre> your personal key, you take it from personal manager or technical department</p>
	<p>You can regenerate your key by request <pre>http://c2c.sip64.ru/call/regen/?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	<p>You have 1000 calls per day, until blocking your account, to end of this day</p>
	<p>You can get your count of calls today<pre>http://c2c.sip64.ru/call/getcalls/?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	
	<br>
	<p class="title">Answers descriptions</p>
	<br>
	<p>All answers encoded to JSON</p>
	<p>While calling<pre>http://c2c.sip64.ru/call/make/78452740740?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	<p>Means you didn't specify number <pre>{"error":["Not defined number"]}</pre></p>
	<p>Means you missed some digits,it should to be equal 11 <pre>{"error":["Wrong number length"]}</pre></p>
	<p>Means you send not only digits in number <pre>{"error":["number is not digital"]}</pre></p>
	<p>Means you sending request from denied address <pre>{"error":["your request not permitted"]}</pre></p>
	<p>Means your key are invalid or blocked <pre>{"error":["your key are wrong or inactive"]}</pre></p>
	<p>Means you didn't specify key <pre>{"error":["Not defined key"]}</pre></p>
	<p>Normal answer, successful request <pre>{"ok":["calling 78452740740"]}</pre></p>
	<br>
	<p>While changing key<pre>http://c2c.sip64.ru/call/regen/?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	<p>Means your key are invalid or blocked <pre>{"error":["your key are wrong or inactive"]}</pre></p>
	<p>Means you didn't specify key <pre>{"error":["Not defined key"]}</pre></p>
	<p>Normal answer, new key <pre>{"ok":["cc4f6207666c254daed65488af9ba9b00aa666f0"]}</pre></p>
	<br>
	<p>While getting count of calls<pre>http://c2c.sip64.ru/call/getcalls/?key=1aae62012f7216e17d4890fe3a5badf0</pre></p>
	<p>Means your key are invalid or blocked <pre>{"error":["your key are wrong or inactive"]}</pre></p>
	<p>Means you didn't specify key <pre>{"error":["Not defined key"]}</pre></p>
	<p>Normal answer, count of today calls <pre>{"ok":["1"]}</pre></p>
	
</div>
