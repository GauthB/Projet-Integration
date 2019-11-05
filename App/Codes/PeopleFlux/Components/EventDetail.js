import React from 'react'
import { StyleSheet, View, Text } from 'react-native'
import eventData from '../Helpers/EventData'
import {KeyboardAwareScrollView} from 'react-native-keyboard-aware-scrollview'


class EventDetail extends React.Component {


  render(){
    const name = this.props.navigation.state.params.name
    const date = this.props.navigation.state.params.date
    const lieu = this.props.navigation.state.params.lieu
    const description = this.props.navigation.state.params.description

    return(
      <View style={styles.main_container}>
        <View style={styles.bordure_titre}>
          <Text style={styles.text_name}>{name}</Text>
            <Text style={styles.text_date}> le {date}</Text>
            <Text style={styles.text_lieu}> A {lieu}</Text>
        </View>
        <KeyboardAwareScrollView style={styles.bordure_description}>
          <Text style={styles.titre_description}>Description : </Text>
          <Text style={styles.text_description}>{description}</Text>
        </KeyboardAwareScrollView>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',
  },
  bordure_titre:{
    height: 110,
    borderColor: '#ff5733',
    borderWidth: 2,
    marginTop: 20,
    marginLeft:6,
    marginRight:6,
    backgroundColor: '#4B4C56',
    borderRadius: 20,


  },
  bordure_description:{
    borderColor: '#ff5733',
    borderWidth: 2,
    marginTop: 10,
    marginLeft:6,
    marginRight:6,
    marginBottom: 5,
    backgroundColor: '#4B4C56',
    borderRadius:10,
  },
  titre_description:{
    color: '#ff5733',
    fontWeight: 'bold',
    marginTop: 15,
    marginLeft: 5
  },

  text_name:{
    fontWeight : 'bold',
    fontSize: 25,
    color: '#c70039',
    textAlign: 'center',
    marginTop: 15
  },
  date_lieu:{
    flexDirection: 'row'
  },
  text_date:{
    fontSize: 15,
    color: '#fff',
    marginTop: 10,
    marginLeft: 10,

  },
  text_lieu:{
    fontSize: 15,
    color: '#fff',
    marginTop: 5,
    marginLeft: 10

  },
  text_description:{
    marginTop: 15,
    marginBottom: 10,
    marginRight : 10,
    marginLeft: 10,
    color: '#fff'
  }
})
export default EventDetail
