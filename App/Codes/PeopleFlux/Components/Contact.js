import React from 'react'
import { StyleSheet, View, TextInput, Text , Platform, Button, TouchableOpacity, Alert  } from 'react-native'
import {KeyboardAwareScrollView} from 'react-native-keyboard-aware-scrollview'
import email from 'react-native-email'



class Contact extends React.Component {

  constructor(props) {
     super(props)
     this.state = {
      mail : '',
      sujet: '',
      corps :''
    }
   }

   _isMailCorrect() {
     if(this.state.mail.includes('@') && this.state.mail.includes('.')){
       return true;
     }
     else{
       return false;
     }
   }

  render() {
    return (

              <View style={styles.main_container}>
                <Text style={styles.text_contact}>Contact</Text>
                <Text style={styles.text_que_souhaitez_vous}>Que souhaitez-vous?</Text>
                <KeyboardAwareScrollView
                  enableOnAndroid={true}
                  enableAutomaticScroll={(Platform.OS === 'ios')}
                >

                  <Text style={styles.champ_mail}>Email</Text>

                  <TextInput
                    style={styles.bordure_mail}
                    value={this.state.mail}
                    onChangeText={(mail) => this.setState({mail})}
                    placeholder='Votre email'
                    placeholderTextColor='#7c7e84'
                    returnKeyType = {"next"}
                    onSubmitEditing={() => { this.secondTextInput.focus(); }}
                    blurOnSubmit={false}
                  />

                  <Text style={styles.champ_sujet}>Sujet</Text>
                  <TextInput
                    ref={(input) => { this.secondTextInput = input; }}
                    style={styles.bordure_sujet}
                    value={this.state.sujet}
                    onChangeText={(sujet) => this.setState({sujet})}
                    placeholder='Votre sujet'
                    placeholderTextColor='#7c7e84'
                    returnKeyType = {"next"}
                    onSubmitEditing={() => { this.thirdTextInput.focus(); }}
                    blurOnSubmit={false}

                  />

                  <Text style={styles.champ_message}>Message</Text>
                  <TextInput
                  ref={(input) => { this.thirdTextInput = input; }}
                    style={styles.bordure_message}
                    value={this.state.corps}
                    multiline={true}
                    numberOfLines={5}
                    onChangeText={(corps) => this.setState({corps})}
                    placeholder='Votre message'
                    placeholderTextColor='#7c7e84'
                  />

                  <TouchableOpacity
                      style={styles.btn_envoie}
                      onPress={this.handleEmail}
                    >
                    <View style={styles.view_btn_envoie}>
                      <Text style={styles.text_btn_envoie}> Envoyer </Text>
                    </View>
                  </TouchableOpacity>


              </KeyboardAwareScrollView>
            </View>


    )
  }

  handleEmail = () => {
        const to = 'peopleflux@gmail.com' // string or array of email addresses
        if(this._isMailCorrect()){
          email(to, {
              // Optional additional arguments
              subject: this.state.sujet,
              body: this.state.corps + '\n\n' + ' email: ' + this.state.mail
          }).catch(console.error)
        }
        else{
          Alert.alert(
            'Mail incorrect',
            'Veuillez entrer un email correct',
            [
              {text: 'OK', onPress: () => console.log('OK Pressed')},
            ],
            {cancelable: false},
          );
        }


    }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',

  },
  text_contact:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10
  },
  text_que_souhaitez_vous:{
    fontSize:20,
    color:'white',
    marginLeft:10,
    marginTop:5
  },
  champ_mail:{
    fontSize:20,
    color :'white',
    marginLeft:25,
    marginTop:18,
  },
  champ_sujet:{
    fontSize:20,
    color :'white',
    marginLeft:25,
    marginTop:20,
  },
  champ_message:{
    fontSize:20,
    color :'white',
    marginLeft:25,
    marginTop:20,
  },
  bordure_mail:{
    height: 40,
    borderColor: '#4B4C56',
    marginTop:5,
    marginLeft:10,
    marginRight:10,
    borderWidth: 1,
    borderRadius:25,
    overflow: 'hidden',
    backgroundColor: '#4B4C56',
    color: '#fff',
    paddingLeft: 15,

  },
  bordure_sujet:{
    height: 40,
    borderColor: '#4B4C56',
    marginTop: 5,
    marginLeft:10,
    marginRight:10,
    borderWidth: 1,
    borderRadius:25,
    overflow: 'hidden',
    backgroundColor: '#4B4C56',
    color: '#fff',
    paddingLeft: 15,


  },
  bordure_message:{
    height: 90,
    borderColor: '#4B4C56',
    marginTop: 5,
    marginLeft:10,
    marginRight:10,
    borderWidth: 1,
    borderRadius:25,
    backgroundColor: '#4B4C56',
    color: '#fff',
    paddingLeft: 15,
    textAlignVertical: 'top',


  },
  view_btn_envoie:{
    flex:1,
    justifyContent: 'center',
    alignItems: 'center'
  },
  btn_envoie:{
    flex:1,
    borderWidth:1,
    borderRadius:30,
    marginTop:25,
    marginLeft:6,
    marginRight:6,
    height:50,
    backgroundColor:'#ff5733',
    alignItems:'center'

  },
  text_btn_envoie:{

    color: 'white',
    alignItems: 'center',
    fontSize:18,
    textAlign:'center',
  }



})

export default Contact
