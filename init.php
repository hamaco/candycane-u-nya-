<?php

$pluginContainer = ClassRegistry::getObject('PluginContainer');
$pluginContainer->installed('cc_u-nya-', '0.2.0');

App::uses('CakeEventManager', 'Event');
CakeEventManager::instance()->attach(function ($event)
  {
    $i = 0;
    $event->data['text'] = $event->result['text'] = preg_replace_callback("/u-nya-/", function ($matches) use (&$i) {
      $i++;
      return <<<EOM
<span id="cc-u-nya-$i"></span><script>
  (function() {
    var aa = [
      "（」・ω・）」うー！",
      "（／・ω・）／にゃー！",
      "（」・ω・）」うー！",
      "（／・ω・）／にゃー！",
      "（」・ω・）」うー！",
      "（／・ω・）／にゃー！",
      "Let's＼(・ω・)／にゃー！",
      "Let's＼(・ω・)／にゃー！"
    ], span = document.getElementById("cc-u-nya-$i"), i = 0;
    setInterval(function() {
      span.innerHTML = aa[i++];
      i = i % aa.length;
    }, 500);
  })();
</script>
EOM;
    }, $event->data['text']);
  }, 'Helper.Candy.afterTextilizable');
