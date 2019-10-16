import React from 'react'
import { StyleSheet, View, TextInput, Button, Text, SafeAreaView, TouchableOpacity, Image, ScrollView, FlatList } from 'react-native'
import equipeData from '../Helpers/EquipeData'
import EquipeItem  from './EquipeItem'

class APropos extends React.Component {

  render() {
    return (
        <View style={styles.main_container}>
            <Text style={styles.text_a_propos}>A Propos</Text>
            <Text style={styles.text_notre_equipe}>Notre equipe</Text>

            <FlatList
              data={equipeData}
              keyExtractor={(item) => item.id.toString()}
              renderItem={({item}) => <EquipeItem equipe={item}/>}
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
    marginTop:5,
    marginBottom:15
  },
  scrollview_container:{

  }

})

export default APropos
