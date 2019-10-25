import React from 'react'
import { StyleSheet, View, Text } from 'react-native'
import eventData from '../Helpers/EventData'

class EventDetail extends React.Component {


  render(){
    const description = this.props.navigation.state.params.description

    return(
      <View style={styles.main_container}>
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
  text_description:{
    marginTop: 50
  }
})
export default EventDetail
