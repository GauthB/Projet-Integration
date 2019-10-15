import React from 'react'
import { StyleSheet, View, TextInput, Button, Text, SafeAreaView, TouchableOpacity, Image,ScrollView } from 'react-native'
import { EquipeList } from './EquipeList'
import { EquipeItem } from './EquipeItem'

class APropos extends React.Component {
  render() {
    return (
        <View style={styles.main_container}>
          <TouchableOpacity style={styles.TouchableOpacity}>
            <View style={styles.title_container}>
              <Text style={styles.title_text_people}> People</Text><Text style={styles.title_text_flux}>Flux </Text>
            </View>
          </TouchableOpacity>
          <Text style={styles.text_a_propos}>A Propos </Text>
          <Text style={styles.text_notre_equipe}>Notre equipe </Text>
          <ScrollView style={styles.scrollview_container}>
            <EquipeList/>
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
  scrollview_container:{

  }

})

export default APropos
