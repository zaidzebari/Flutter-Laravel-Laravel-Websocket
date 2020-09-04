import 'package:flutter/material.dart';
import 'package:flutter_pusher_client/flutter_pusher.dart';
import 'package:laravel_echo/laravel_echo.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Laravel Laravel Websocket',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(title: 'Flutter Laravel Laravel Websocket'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);
  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  FlutterPusher pusher;
  Echo echo;
  List<Message> message = [];

  void initSocket() {
    print('initiating Socket....');
    PusherOptions options = PusherOptions(
      host: '192.168.1.22',
      port: 6001,
      cluster: 'mt1',
      encrypted: false,
    );

    try {
      pusher = FlutterPusher('ABCDEFG', options, enableLogging: true);
    } catch (e) {
      print("socket exception zaid");
      print(e.errMsg());
    }
    echo = new Echo({
      'broadcaster': 'pusher',
      'client': pusher,
    });

    echo.channel('home').listen('NewMessage', (event) {
      print('this is event text ' + event['message'].toString());

      setState(() {
        message.add(Message(event['message'].toString()));
      });
    });
  }

  @override
  void dispose() {
    echo.disconnect();

    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: ListView.builder(
            physics: ScrollPhysics(),
            shrinkWrap: true,
            itemCount: message.length,
            itemBuilder: (BuildContext contex, int index) {
              return ListTile(
                title: Text(
                  message[index].message.toString(),
                  style: TextStyle(fontSize: 22),
                ),
              );
            }),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () => initSocket(),
        tooltip: 'Increment',
        child: Icon(Icons.add),
      ),
    );
  }
}

class Message {
  String message;
  Message(this.message);
}
