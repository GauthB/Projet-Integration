import React from 'react'
import { StyleSheet, View, TextInput, Button, Text, SafeAreaView,Alert, TouchableOpacity, Image, ScrollView, FlatList } from 'react-native'



class Contact extends React.Component {

  constructor(props) {
     super(props);
     this.state = { text: 'Votre email',};
     this.sujet = { text: 'Votre sujet'};
     this.message = { text : 'Votre message'}
   }

  render() {
    return (

          <View style={styles.main_container}>

              <ScrollView>
                <Text style={styles.text_a_propos}>Contact</Text>
                <Text style={styles.text_notre_equipe}>Que souhaitez vous?</Text>


                <Text style={styles.champ_mail}>Email</Text>
                <TextInput
                  style={styles.bordure_mail}
                  onChangeText={(text) => this.setState({text})}
                  value={this.state.text}
                />

                <Text style={styles.champ_sujet}>Sujet</Text>
                <TextInput
                  style={styles.bordure_sujet}
                  onChangeText={(text) => this.setState({text})}
                  value={this.sujet.text}
                />

                <Text style={styles.champ_message}>Message</Text>
                <TextInput
                  style={styles.bordure_message}
                  onChangeText={(text) => this.setState({text})}
                  value={this.message.text}
                />
                <View style={styles.btn_envoie}>
                <Button title='Envoyer' color='white' onPress={() => Alert.alert('le commercant rend pas la monnaie')}/>
                </View>
              </ScrollView>
            </View>


    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',

  },
  touchableOpacity: {

    justifyContent: 'center',
    alignItems: 'center',

  },
  text_a_propos:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10
  },
  text_notre_equipe:{
    fontSize:20,
    color:'white',
    marginLeft:10,
    marginTop:5
  },
  champ_mail:{
    fontSize:20,
    color :'white',
    marginLeft:15,
    marginTop:18,
  },
  champ_sujet:{
    fontSize:20,
    color :'white',
    marginLeft:15,
    marginTop:1,
  },
  champ_message:{
    fontSize:20,
    color :'white',
    marginLeft:15,
    marginTop:20,
  },
  bordure_mail:{
    height: 35,
    borderColor: '#404040',
    marginBottom:18,
    marginLeft:6,
    marginRight:6,
    borderWidth: 1,
    borderRadius:25,
    overflow: 'hidden',
    backgroundColor: '#404040'
  },
  bordure_sujet:{
    height: 35,
    borderColor: '#404040',
    marginTop: 1,
    marginLeft:6,
    marginRight:6,
    borderWidth: 1,
    borderRadius:25,
    overflow: 'hidden',
    backgroundColor: '#404040'
  },
  bordure_message:{
    height: 90,
    borderColor: '#404040',
    marginTop: 1,
    marginLeft:6,
    marginRight:6,
    borderWidth: 1,
    borderRadius:25,
    backgroundColor: '#404040'
  },
  btn_envoie:{
    borderWidth:1,
    backgroundColor: '#FF5800',
    borderRadius:30,
    marginTop:25,
    marginLeft:6,
    marginRight:6,

  }



})

export default Contact
