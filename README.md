# DiscordPHP

Welcome to DiscordPHP! DiscordPHP is a collection of some (at the moment only one) PHP-classes for Discord. 

## Webhooks

### Send a message

#### Create Webhook

To send a message, you have to create a "Webhook" first. Go to your server settings, select Integrations and create one. You can customize your webhook, if you wish. Copy the URL. 

#### Use the class

Now you have to create a new PHP file or add the following code to your current.

```php

require_once("discord.send.php"); // include the class
$message = new DiscordMessage("YOUR WEBHOOK URL"); // insert your webhook url between "
$message->sendMessage("Webhooks are awesome!");

```

That's simple. Isn't it? Now you have a working Webhook for Discord! Awesome. 

#### Useful functions

__Mentions__

You know, it's annoying to type everytime you want to mention a user or a text channel something like ``<@user-id>``. Better use the included functions!

Before: (hateful) 
```php
$message->sendMessage("<@randomuserid> is in <#randomchannelid>");
```

After: (beautiful)
```php
$channelMention = $message->createChannelMention("channel-id");
$userMention    = $message->createMention("user-id");

$message->sendMessage($userMention . " is in " . $channelMention);
```

__Emotes__

Everyone likes emotes. But it's complicated to use them as a developer! That's why I've coded a function for this task. 

```php
$message->sendMessage($m->createEmote("pepeOK","741677671267696715"));
```

![output](https://imgur.com/a/Rcb9eTC)
