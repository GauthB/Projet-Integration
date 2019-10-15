import React from 'react'
import { StyleSheet, View, TextInput, Button, Text, SafeAreaView, TouchableOpacity, Image, ScrollView, FlatList } from 'react-native'



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
            <View style={styles.title_container}>
              <Text style={styles.title_text_people}>People</Text><Text style={styles.title_text_flux}>Flux</Text>
            </View>
            <Text style={styles.text_a_propos}>Contact</Text>
            <Text style={styles.text_notre_equipe}>Que souhaitez vous?</Text>
            <Text style={styles.champ_mail}>Email</Text>

            <TextInput
        style={{height: 35, borderColor: 'red',marginBottom:18, borderWidth: 1,borderRadius:25,overflow: 'hidden'}}
        onChangeText={(text) => this.setState({text})}
        value={this.state.text}
      />
      <Text style={styles.champ_sujet}>Sujet</Text>
      <TextInput
  style={{height: 40, borderColor: 'red',marginTop: 1, borderWidth: 1,borderRadius:25,overflow: 'hidden'}}
  onChangeText={(text) => this.setState({text})}
  value={this.sujet.text}
/>
      <Text style={styles.champ_message}>Message</Text>
      <TextInput
    style={{height: 100, borderColor: 'red',marginTop: 1, borderWidth: 1,borderRadius:25,overflow: 'hidden'}}
    onChangeText={(text) => this.setState({text})}
    value={this.message.text}
/>





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
    alignItems: 'center'

  },
  title_container:{
    flexDirection:'row',
    textAlign:'center',
    justifyContent: 'center',
    alignItems: 'center'

  },
  title_text_people: {
    marginTop:50,
    color:'white',
    fontSize:30,

  },
  title_text_flux:{
    marginTop:50,
    color:'#ff5733',
    fontSize:30,

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
  }



})

export default Contact
