import React from 'react'
import { StyleSheet, View, Text } from 'react-native'
import eventData from '../Helpers/EventData'

class EventDetail extends React.Component {


  render(){
    const name = this.props.navigation.state.params.name
    const date = this.props.navigation.state.params.date
    const lieu = this.props.navigation.state.params.lieu
    const description = this.props.navigation.state.params.description

    return(
      <View style={styles.main_container}>

        <Text style={styles.text_name}>{name}</Text>
        <Text style={styles.text_date}>{date}</Text>
        <Text style={styles.text_lieu}>{lieu}</Text>
        <Text style={styles.text_description}>{description}</Text>

      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',
  },
  text_name:{
    marginTop: 50
  },
  text_date:{
    marginTop: 50
  },
  text_lieu:{
    marginTop: 50
  },
  text_description:{
    marginTop: 50
  }
})
export default EventDetail
